<?php
class competidorSql
{
     public static function  registrarCompetidor()
    {
        $query="INSERT INTO tbl_competidor (`idcompetidor`,`cnombre`,`cdesc`) VALUES (?,?,?);";
        return $query;
    }

    public static function validateIfExistsCompetidor()
    {
        $query = "SELECT * FROM tbl_competidor WHERE cnombre =?";
        return $query;
    }
}
?>