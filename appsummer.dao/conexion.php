<?php
/**
 *
 */
class Conexion
{

    public function __construct()
    {
        # code...
    }
    public function conectar()
    {
        // $pdo_conn = new PDO( 'mysql:host=sql110.epizy.com;dbname=epiz_21389800_dbitz_summer;charset=utf8;','epiz_21389800','6mPPGsucEGiY');
        $pdo_conn = new PDO('mysql:host=localhost;dbname=dbitz_summer;charset=utf8;', 'root', 'Samiloko99');
         // $pdo_conn = new PDO( 'mysql:host=localhost;dbname=id4636351_dbitz_summer;charset=utf8;','id4636351_itz','199720031230');
        return $pdo_conn;
    }

}
