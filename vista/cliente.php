<?php 
require_once "../controlador/sessionValidate.php";
require_once "../controlador/sessionUserTypeAdmin.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Clientes</title>
    <!--CSS-->    
    <link rel="stylesheet" href="assets/css/bootstrap-yeti.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
</head>
<body>

    <div id="response"></div>

    <!-- DATATABLE -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" class="btn btn-info" onclick="loadCliente()"><i class="fa fa-refresh"></i>&nbsp;Refrescar</a>
            </div>
        </div>
        <div class="row">            
            <div id="mensaje-delete"></div>            
            <h1>Cliente                
                <a href="" data-toggle="modal" data-target="#myModal"  class="btn btn-success pull-right menu"><i class="fa fa-user-plus " aria-hidden="true"></i>&nbsp;Nuevo Cliente</a>
            </h1>  
        </div>
        <div class="row">    
        <table id="example" class="table table-striped table-bordered table-responsive">
            <thead>
            <tr>
                <th>IdCliente</th>
                <th>Nombre Cliente</th>
                <th>Descripcion</th>
                <th>Ruc</th>               
                                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                <th>IdCliente</th>
                <th>Nombre Cliente</th>
                <th>Descripcion</th>
                <th>Ruc</th>               
                                <th>Acciones</th>
            </tr>
            </tfoot>
        </table>        
        </div>
    </div>
    <!-- END DATATABLE -->

    <!-- MODAL REGISTER -->
    <div class="modal fade in" id="myModal" >
        <div class="modal-dialog" style="width:50%;">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                    <h4 class="modal-title"><b></b>Registro Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid" id="notificacion"></div>
                    <form id="formregistro"> 
                        <fieldset>
                            <div class="form-group">                            
                                <div class="col-lg-4">
                                    <div class="form-group" id="camponombre">
                                        <label class="control-label" for="cnombre">Nombre Cliente</label>
                                        <input type="text" class="form-control" id="cnombre" name="cnombre" autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group" id="campodesc">
                                        <label class="control-label" for="cdesc">Descripcion</label>
                                        <input type="text" class="form-control" id="cdesc" name="cdesc">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group" id="campoRuc">
                                        <label class="control-label" for="Ruc">RUC</label>
                                        <input type="text" class="form-control" id="Ruc" name="Ruc">
                                    </div>
                                </div>
                                                       
                                <div class="col-lg-4 col-lg-offset-8">
                                    <div class="form-group">
                                         <button type="submit" class="btn btn-primary btn-block">Registrar</button>                                     
                                    </div>
                                </div>
                            </div>   
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">                
                </div>
            </div>
        </div>
     </div>
     <!-- END MODAL REGISTER -->

     <!-- MODAL UPDATE -->
    <div class="modal fade in" id="myModalActualiza" >
        <div class="modal-dialog" style="width:50%;">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><b></b>Actualizar Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid" id="mensaje"></div>
                    <form id="formactualizar">
                    <div id="contenido-update"></div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL UPDATE -->

    <!--Javascript-->    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>          
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/clientejs.js"></script>
</body>
</html>