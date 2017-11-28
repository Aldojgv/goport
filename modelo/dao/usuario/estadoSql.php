<?php
class estadoSql
{

    public static function  registrarEstado()
    {
        $query="INSERT INTO `tbl_estado` (`idoestado`,`oestado`,`edesc`) VALUES (?,?,?);";
        return $query;
    }

    public static function validarEstado()
    {
        $query = "SELECT * FROM tbl_estado WHERE oestado=?";
        return $query;
    }
}
?>