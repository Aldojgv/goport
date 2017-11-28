<?php
class usuariosSql
{
    public static function  indentificarUsuario()
    {
        $query="SELECT * FROM tbl_usuario WHERE usuario=? AND clave=?";
        return $query;
    }

    public static function  registrarUsuario()
    {
        $query="INSERT INTO tbl_usuario (usuario,clave)VALUES(?,?)";
        return $query;
    }

    public static function validateIfExistsUser()
    {
        $query = "SELECT * FROM usuarios WHERE tbl_usuario =?";
        return $query;
    }
}
?>