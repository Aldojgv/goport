<?php
class usuariosSql
{
    public static function validateIfExistsCliente()
    {
        $query = "SELECT * FROM tbl_cliente WHERE ruc =?";
        return $query;
    }
}
?>