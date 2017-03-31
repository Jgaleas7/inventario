<?php 
      include_once '../config/conexion2.php';
 $mbd=DB::connect();DB::disconnect();
            $id = $_GET['id'];
            $proof=$mbd->query("SELECT * from empleados WHERE id='$id'");
      foreach($proof as $row){
		  $row["nombre"];
		  $row["apellido"];
		  $row["telefono"];
		  $row["id"];
		  //var_dump($row["nombre"]);
	  }
       // $row=mysqli_fetch_array($d);
//var_dump($row);
//falta seleccionar el radio de sexo




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empleados</title>
      <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../bootstrap/css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
     
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body>
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>
<div class="">  
   <div id="menu" class="menu">
       <?php
       // include("../menu_prueba.html");
        ?>
   </div>
   <div id="cuerpo" class="col-md-8" >
       <header class="header">
       <center><strong><h1>Actualizar empleado </h1></strong></center>
       </header>
      
       
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"></h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form >
                 <div class="box-body">
                  
               
                   <div class="form-group">
                      
                      <input value="<?php if (isset($row["id"])) echo $row["id"];?>"  type="hidden" class="form-control input-sm" id="id" name="id" >
                    </div>
                    
                
                    <div class="form-group">
                      <label for="saldo">Nombre</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input value= "<?php echo $row["nombre"];?>" type="text" class="form-control input-lg" id="nombre" name="nombre" required placeholder="Nombre">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="puntos">Apellido</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input value= "<?php echo $row["apellido"];?>" type="text" class="form-control input-lg" id="apellido" name="apellido" required placeholder="Apellido">
                        </div>
                    </div>
                     
                     <div class="form-group">
                      <label for="puntos">Apellido</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input value= "<?php echo $row["telefono"];?>" type="text" class="form-control input-lg" id="telefono" name="telefono"  placeholder="telefono">
                        </div>
                    </div>
                    
                   
                     
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar/Actualizar</button>
                   
                  </div>
                </form>
                <script> 
                 

 
 $("#guardar").click(function()
        {
 
    var identidad = $("#id").val();
    var telefono = $("#telefono").val();
   
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
  
   
    // alert(identidad+" "+numempleado+" "+nombre+" "+apellido+" "+telefono+" "+correo+" "+area);    
     
 
            
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"editar",
                    telefono:telefono,
                 	nombre:nombre,
                    apellido: apellido,
                    id: identidad
                 
                   
                  
                },
                success: function(data)
                {
                   alert(data);
                     toastr.success('Exito','se ha actualizado correctamnete');
                   // limpiarcampos();
                   goBack();
                   // setTimeout(function(){  goBack();  }, 3000);
                    
                    
                    
                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                    toastr.error('Error','Ha ocurrido un error');
                }
            })    
     
 });
                    
    function limpiarcampos(){
        document.getElementById("telefono").value="";
        document.getElementById("id").value="";
     
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