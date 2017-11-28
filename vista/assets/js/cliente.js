var x;
x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
    loadDataTableClientes();
    tooltip();
    rgCliente();
}
function loadCliente() {
    $('#contenido').html("");
    $.post("cliente.php", function(response) {        
        $('#contenido').html(response);
        $('#contenido').fadeIn();
    });
function rgCliente() {  
  $('#formregistro').submit(function(event){
  event.preventDefault();
  var cnombre = $("#cnombre").val();
  var cdesc = $("#cdesc").val();
  var Ruc=$("#Ruc").val();
   
  if (cnombre == null || cnombre.length == 0) {
    $("#cnombre").addClass("has-error");
    alert("Por favor ingresa tu nombre");
    return false;
  }
  else {
    $("#cnombre").removeClass("has-error");
  }
  
  if (cdesc == null || cdesc.length == 0) {
    $("#cdesc").addClass("has-error");
    alert("Por favor ingresa tu descripcion");
    return false;
  }else {
    $("#cdesc").removeClass("has-error");
  }

  if (Ruc == null || Ruc.length == 0) {
    $("#Ruc").addClass("has-error");
    alert("Por favor ingresa tu Ruc.")
    return false;
  }else {
    $("#Ruc").removeClass("has-error");    
  }
      
    $("#notificacion").html("");
    var datos = "action=insert&" + $("#formregistro").serialize();
    $.post("../controlador/clienteController.php", datos, function(data) {        
        $('#notificacion').html(data);
        $('#notificacion').fadeIn();  
    });    
  });
}

function upCliente() {         
    $("#mensaje").html("");
    var datos = "action=savedata&" + $("#formactualizar").serialize();
    $.post("../controlador/clienteController.php", datos, function(data) {        
        $('#mensaje').html(data);
        $('#mensaje').fadeIn();
    });
}

function traeDatosClienteId(idCliente) {
  $("#mensaje").html("");
  $('#contenido-update').html("");
  var idCliente    = cliente.idCliente;
  var datos = "action=update&id="+idCliente ;
  $.post("../controlador/clienteController.php", datos, function(data) {
      $('#contenido-update').html(data);        
  });
}

function delCliente(idCliente) { 
    if(confirm('¿Seguro que desea eliminar este cliente?')){
      $("#mensaje-delete").html("");
      var idCliente    = cliente.idCliente;
      var datos = "action=delete&id="+idCliente ;
      $.post("../controlador/clienteController.php", datos, function(data) {
          $('#mensaje-delete').prepend(data);
          $('#mensaje-delete').show('slow');
          $('#mensaje-delete').fadeOut(5000);  
      });     
    } 
}

function loadCliente() {
    $('#contenido').html("");
    $.post("cliente.php", function(response) {        
        $('#contenido').html(response);
        $('#contenido').fadeIn();
    });
}  

function tooltip() {
   $('[data-toggle="tooltip"]').tooltip(); 
}

function loadDataTableClientes() {
  $('#example').DataTable( {  
    "bDeferRender": true,
    "ajax": "../controlador/loadListController.php?action=cliente",        
    "columns": [
    { "data" : "idCliente" },
    { "data" : "cnombre" },
    { "data" : "cdesc" },
    { "data" : "Ruc"}
    ],      
    "sPaginationType": "full_numbers",          
    "oLanguage": {
            "sProcessing":     "Procesando...",
        "sLengthMenu": 'Mostrar <select>'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="50">50</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',    
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
  });
}
