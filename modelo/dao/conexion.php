<?php

class conexion {

    private static $host = "localhost";
    private static $user = "root";
    private static $pwd = "Modt1234-";
    private static $bd = "bdgopor";

    public static function conectar() {
        return mysqli_connect(conexion::$host, conexion::$user, conexion::$pwd, conexion::$bd);
    }

}
?>
