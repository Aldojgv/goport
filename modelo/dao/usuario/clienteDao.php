<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/goport/ruta.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/modelo/dao/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/modelo/dao/procesaParametros.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/modelo/dao/usuario/clienteSql.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/vista/logicavista/notificationView.php';

/**
* 
*/
class clienteDao
{
	private $con;
	
	  function __construct() {
        $this->con=  conexion::conectar();
    }
    function __destruct() {
        $this->con->close();
    }
    function  registrarClienteDao($cnombre,$cdesc,$Ruc) {
      $datosArray=array($Ruc);
      $st=  procesaParametros::PrepareStatement(clienteSQL::validar(),$datosArray);

      $query=$this->con->query($st);

      if($query->num_rows==0)
      {
        $st = "INSERT INTO tbl_Cliente(cnombre,cdesc,Ruc) 
        VALUES('$cnombre', '$cdesc', '$Ruc')";

        $query = $this->con->query($st); 
        $result = Notification::registeredRecord($query);

      } 
      else
      {
        $result = Notification::existsCliente();
      }
      return $result;
    }
     function saveDataClienteDao($idCliente,$cnombre,$cdesc,$Ruc) {
      $st = "UPDATE tbl_Cliente SET cnombre='$cnombre', cdesc='$cdesc', Ruc='$Ruc' WHERE idCliente = $idCliente";
      $query = $this->con->query($st); 
      $result = Notification::updatedRecord($query);
      return $result;
    }
 function eliminarClienteDao($idCliente) {
      $st = "DELETE FROM tbl_Cliente WHERE idCliente=$idCliente";
      $query = $this->con->query($st); 
      $result = Notification::deletedRecord($query);
       return $result;
    }
    function traerClienteDao() {

      $data = "";
      $st = "SELECT * FROM tbl_cliente";
      $query= $this->con->query($st); 

      while ($row =  mysqli_fetch_array($query) ) {
      
      $editar = '<a href=\"#\" data-toggle=\"modal\" data-target=\"#myModalActualiza\" id=\"'.$row['idCliente'].'\" onclick=\"traeDatosClienteId(this)\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
      $eliminar = '<a href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" id=\"'.$row['idCliente'].'\" onclick=\"delCliente(this)\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
        
        $data.='{
              "idCliente":"'.$row['idCliente'].'",
              "cnombre":"'.$row['cnombre'].'",
              "cdesc":"'.$row['cdesc'].'",
              "Ruc":"'.$row['Ruc'].'",
              "acciones":"'.$editar.$eliminar.'"
            },';
    }
        $data = substr($data,0, strlen($data) - 1);
        $result =  '{"data":['.$data.']}';

        return $result;
    }
 function actualizarClienteDao($idCliente) {
      $cad = "";
      $st = "SELECT * FROM tbl_Cliente WHERE idCliente = '$idCliente'";

      $query= $this->con->query($st); 

      while ($row =  mysqli_fetch_array($query) ) {

        $cad = '
            <fieldset>
                <div class="form-group"> 
                    <input type="hidden" class="form-control" name="a" value="'.$row['idCliente'].'">                           
                    <div class="col-lg-4">
                        <div class="form-group" id="camponombre">
                            <label class="control-label" for="cnombre">Cliente</label>
                            <input type="text" class="form-control" id="cnombre" name="b" autofocus value="'.$row['cnombre'].'" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group" id="campodesc">
                            <label class="control-label" for="cdesc">Descripcion</label>
                            <input type="text" class="form-control" id="cdesc" name="c" value="'.$row['cdesc'].'" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group" id="campoRuc">
                            <label class="control-label" for="Ruc">RUC</label>
                            <input type="text" class="form-control" id="RUC" name="d" value="'.$row['RUC'].'" required>
                        </div>
                    </div>
                                          
                    <div class="col-lg-4 col-lg-offset-8">
                        <div class="form-group">
                              <a href="#" class="btn btn-primary btn-block" onclick="upCliente()">Actualizar</a>
                        </div>
                    </div>
                </div>   
            </fieldset>
        ';

    }
    return $cad;
    }
}
?>