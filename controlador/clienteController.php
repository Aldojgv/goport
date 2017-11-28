<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/Modelo/Bo/clienteBo.php';

switch ($_POST['action']) {
     
  case 'insert':
    $cnombre  = $_POST['cnombre'];
    $cdesc   = $_POST['cdesc'];
    $Ruc      = $_POST['Ruc'];
    
    $bo = new clienteBo();
    $r = $bo->registrarClienteBo($cnombre, $cdesc, $Ruc);
    print $r;
    break; 

    case 'update':
         $idCliente = $_POST['idCliente'];

         $bo = new clienteBo();
         $r = $bo->actualizarClienteBo($idCliente);
         print $r;
         break; 

    case 'savedata':
        $idCliente        = $_POST['a']; 
        $cdesc  = $_POST['b'];
        $Ruc  = $_POST['c'];
          
        $bo = new clienteBo();
        $r = $bo->saveDataClienteBo($idCliente,$cnombre,$cdesc,$Ruc);
        print $r;
        break;

    case 'delete':
        $idCliente = $_POST['idCliente'];

        $bo = new clienteBo();
        $r = $bo->eliminarClienteBo($idCliente);
        print $r;
        break;
    case 'select':
        $bo = new clienteBo();
        $r = $bo->traerClienteBo();
        print $r;
        break;
}
  