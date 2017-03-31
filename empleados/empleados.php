<?php  
session_start();
//if($_SESSION['tipo']!="admin"){
  //  echo "<script>  window.location.href='ver_empleados.php';  alert('no tiene permisos para crear nuevos empleados');</script>";
//}
?>
<!D
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empleados</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
     <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="login-page">
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>
<div class="">
   
   <div id="cuerpo" class="col-md-8" >
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Añadir Empleado</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form >
                 <div class="box-body">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control input-md" id="nombre" name="nombre" required placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="apellido">Apellido</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control input-md" id="apellido" name="apellido" required placeholder="Apellido">
                        </div>
                    </div>
                     <div class="form-group">
                      <label for="telefono">Telefono</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-tel"></i>
                        </div>
                        <input type="text" class="form-control input-md" id="telefono" name="telefono"  placeholder="Telefono">
                        </div>
                    </div>
                        </div>
                    </div>
                     
                  </div><!-- /.box-body -->

                  <div class="box-footer btn-group text-center col-md-offset-3">
                    <button type="button" id="guardar" class="btn   btn-primary btn-lg">Guardar</button>
                    <button type="reset"  class="btn  btn-danger btn-lg">Cancelar</button>
                  </div>

       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
       <script type="text/javascript" src="../js/toastr.js"></script>
                <script> 

 
 $("#guardar").click(function()
        {
				var telefono = $("#telefono").val();
				var nombre = $("#nombre").val();
				var apellido = $("#apellido").val();

  if( nombre.trim()=='' && apellido.trim()=='')
            {
						toastr.error("Hay campos que son obligatorios");
                		return;
            }
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"guardar",
                    telefono:telefono,
                    nombre:nombre,
                    apellido: apellido
                   
                   
                  
                },
                success: function(data)
                { if(data=="Error"){
					
					toast.error('error', 'nombre');
					return;
				}
                   
                   toastr.success('Exito','se ha Guardado correctamnete');
                    limpiarcampos();
                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    toast.error("No funciona ajax para guardar");
                }
            })
 });
    function limpiarcampos(){
        document.getElementById("telefono").value="";

        document.getElementById("nombre").value="";
        document.getElementById("apellido").value="";
  
    }
					  function goBack(){
             setTimeout(function(){  window.location.href="ver_empleados.php";  }, 30);
             
         }
                    
    </script>
              </div>
       </div>
   </div>
  

</body>

    
</html>