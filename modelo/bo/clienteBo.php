<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/goport/ruta.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/Modelo/Dao/usuario/clienteDao.php';

/**
* 
*/
class clienteBo 
{
	
	function __construct()
	{
 $this->dao=new clienteDao();
	}
	 function registrarClienteBo($cnombre, $cdesc, $Ruc) {
        $resultado = $this->dao->registrarClienteDao($cnombre,$cdesc,$Ruc);
        return $resultado;
    }
 function traerClienteBo(){
        $resultado = $this->dao->traerClienteDao();
        return $resultado;
    }
        function actualizarClienteBo($usuario) {
        $resultado = $this->dao->actualizarUsuarioDao($usuario);
        return $resultado;
    }
    function saveDataClienteBo($idCliente,$cnombre,$cdesc,$Ruc)  {
        $resultado = $this->dao->saveDataClienteDao($idCliente,$cnombre,$cdesc,$Ruc);
        return $resultado;
    }
     function eliminarClienteBo($idCliente) {
        $resultado = $this->dao->eliminarClienteDao($idCliente);
        return $resultado;
    }
}

?>