<?php
@session_start();
require_once '../appsummer.dao/SummerDao.php';
?>
<?php
include '../appsummer.clases/PlantillaPdf.php';
if (isset($_GET['summer_id'])) {
    $ver = new SummerDao();
    $ver = $ver->getSummerIdEdit($_GET['summer_id'], $_SESSION['student_id']);
    $i   = count($ver);
    if ($i > 1) {
        $summer_id          = $ver['summer_id'];
        $summer_namecourse  = $ver['summer_namecourse'];
        $summer_matterid    = $ver['summer_matterid'];
        $summer_nameteacher = $ver['summer_nameteacher'];
        $summer_starthour   = $ver['summer_starthour'];
        $summer_finalhour   = $ver['summer_finalhour'];
        $faculty_name       = $ver['faculty_name'];
        $faculty_id         = $ver['faculty_id'];

    } else {
        header('location:home.php');

    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 14);
$pdf->Cell(20, 6, 'Materia:', 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'b', 14);
$pdf->Cell(100, 6, $summer_namecourse, 0, 1, 'L', 0);
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(20, 6, 'Clave:', 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'b', 14);
$pdf->Cell(30, 6, $summer_matterid, 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(120, 6, 'Horario: ', 0, 0, 'R', 0);
$pdf->SetFont('Arial', 'b', 14);
$pdf->Cell(5, 6, $summer_starthour . '-', 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'b', 14);
$pdf->Cell(5, 6, $summer_finalhour, 0, 1, 'L', 0);
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(50, 6, 'Nombre del profesor:', 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'b', 14);
$pdf->Cell(100, 6, $summer_nameteacher, 0, 1, 'L', 0);
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(18, 6, 'Carrra: ', 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'b', 14);
$pdf->Cell(5, 6, $faculty_name, 0, 1, 'L', 0);
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(18, 6, 'Clave: ', 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'b', 14);
$pdf->Cell(5, 6, $faculty_id, 0, 1, 'L', 0);
$pdf->Ln(5);
$ptts     = new SummerDao();
$ptts     = $ptts->getStudentSummer($summer_id);
$countstu = count($ptts);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(30, 6, '(' . $countstu . ') estudiantes inscritos', 0, 1, 'L', 0);

$pdf->SetFont('Arial', 'b', 10);
$pdf->Cell(30, 6, '#Control', 0, 0, 'L', 0);
$pdf->Cell(60, 6, 'Nombre (s)', 0, 0, 'L', 0);
$pdf->Cell(60, 6, 'Apellidos', 0, 0, 'L', 0);
$pdf->Cell(60, 6, 'Clave Carrera', 0, 1, 'L', 0);

$pdf->SetFont('Arial', '', 10);

foreach ($ptts as $key => $value) {

    $pdf->Cell(30, 6, $value['student_id'], 0, 0, 'L', 0);
    $pdf->Cell(60, 6, $value['student_name'], 0, 0, 'L', 0);
    $pdf->Cell(60, 6, $value['student_firstname'] . ' ' . $value['student_secondname'], 0, 0, 'L', 0);
    $pdf->Cell(60, 6, $value['student_facultyid_faculties'], 0, 1, 'L', 0);
}
// $pdf->Output('D', 'participantes.pdf');
$pdf->Output();
