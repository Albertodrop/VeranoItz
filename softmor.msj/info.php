<?php
@session_start();
if (!$_SESSION['msj']) {
    header('location:../students/home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Alerta</title>
    <?php include '../appsummer.itz/modules/head.php'?>
</head>
<body>


    <?php
if (isset($_GET['msj'])) {
    $msj      = $_GET['msj'];
    $type     = $_GET['type'];
    $title    = '';
    $carpeta  = $_GET['c'];
    $archivo  = $_GET['a'];
    $location = '../' . $carpeta . '/' . $archivo . '.php';
    include $location;
    if ($type == 'success') {
        $title = '!BIEN HECHO!';

    } else if ($type == 'error') {
        $title    = 'UPS... ALGO SALIO MAL :(';
        $location = 'back';
    } else if ($type == 'warning') {
        $title = '¡ADVERTANCIA!';
    }
    $_SESSION['msj'] = false;
    ?>
    <script>
            swal({
            title: '<?php echo $title ?>',
            text: '<?php echo $msj; ?>',
            icon: '<?php echo $type ?>',
            button: 'Ok!',

            }).then(function(){
                <?php if ($location == 'back') {?>
                    history.back();
                    <?php } else {?>
                    location.href='<?php echo $location ?>';
                    <?php }?>
            });
    </script>

        <?php }?>

</body>
</html>