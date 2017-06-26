<?php  
session_start();

//if($_SESSION['tipo']!="admin"){
   // echo "<script>  window.location.href='ver_usuario.php';  alert('no tiene permisos para crear nuevos usuarios');</script>";
    
//}  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="login-page">

   <div id="cuerpo" class="col-md-8" >

           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Crear Nuevo Usuario</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form >
                 <div class="box-body">
                  
                  
                   <div class="form-group">
                      <label for="empleado">Empleados</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-list"></i>
                        </div>
                       
                        <select class="form-control " id="empleado" name="empleado">
                         <?php cargaComboBox("SELECT * FROM `empleados`","id","nombre","apellido") ?>
                        </select>
                        </div>
                        </div>
                    <div class="form-group">
                      <label for="nombre">Nombre de Usuario</label>
                      <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Ingrese un nombre de usuario">
                    </div>
                     
                    <div class="form-group">
                      <label for="contrasena">contrase&ntilde;a</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-key"></i>
                        </div>
                        <input type="password" class="form-control " id="contrasena" name="contrasena" placeholder="Ingrese la contrase&ntilde;a">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="ccontrasena">Confirmar contrase&ntilde;a</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-key"></i>
                        </div>
                        <input type="password" class="form-control " id="ccontrasena" name="ccontrasena" placeholder="Confirme la contrase&ntilde;a">
                        </div>
                    </div>
                     
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                  </div>
                </form>
                  <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
                  <script type="text/javascript" src="../plugins/select2/select2.min.js"></script>
                  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

                  <script type="text/javascript" src="../js/toastr.js"></script>
                <script>
                    $(document).ready(function () {
                        $("select").select2();
                    });
        /* function validaClave(c1, c2){
             if(c1 != c2){
          toastr.error('Error','no coinciden las claves');
         return;
             
             }
         }
          function validalongitud(c){
              if(c.length<8){
          //toastr.error('Error','debe ser minimo 8 caracteres');
          toastr.error('Error','debe ser minimo 8 caracteres');
         return;
             
             }
          }
                    
              */
                    
 
 $("#guardar").click(function()
        {
     
    var empleado = $("#empleado").val();
    var nombre = document.getElementById('nombre').value;
    var contrasena = document.getElementById('contrasena').value;
    var cc = document.getElementById('ccontrasena').value;
    
   //  alert("emp "+empleado+"nom "+nombre+"con "+contrasena+" cc "+ cc);
     if( nombre.trim()=='' && cc.trim()=='' && contrasena.trim()=='')
            {
                toastr.error('Error','Hay campos obligatorios');
              
                return;
            }
   //  validaClave(contrasena, cc);
     
     
 
     
     if(contrasena != cc){
          toastr.error('Error','no coinciden las claves');
         return;
         
     }
  
            
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"guardar",
                    empleado:empleado,
                    nombre:nombre,
                    contrasena:contrasena,
                    cc:cc
                    
                },
                success: function(data)
                {
                    if(data=="yae"){
                        toastr.error('Error','este empleado ya tiene cuenta');
                        toastr.error('Error','este empleado ya tiene cuenta');
                        return;
                    }
                    if(data=="yan"){
                        toastr.error('Error','este nombre de usuario ya existe');
                        toastr.error('Error','este nombre de usuario ya existe');
                        
                    }
                    if(data=="bien"){
                        toastr.success('Correcto','el usuario se ha creado exitosamente');
                        toastr.success('Correcto','el usuario se ha creado exitosamente');
                        
                    }
                
                    limpiarcampos();
                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                }
            })    
     
 });
                    
    function limpiarcampos(){
        document.getElementById("empleado").value="";
        document.getElementById("nombre").value="";
        document.getElementById("contrasena").value="";
        document.getElementById("ccontrasena").value="";
               
    }
                    
    </script>
              </div>
       </div>
   </div>
  

</body>
  
<?php 	
function cargaComboBox($consul,$id,$nombre, $apellido)
    {
     include('../config/conexion2.php');
        //$resul=mysqli_query($mysqli,$consul);
	$mbd=DB::connect();DB::disconnect();
	$proof=$mbd->query($consul);
        while ($row = $proof->fetch(PDO::FETCH_ASSOC))
        {
            echo "<option value='".$row["$id"]."'>";
            echo $row["$nombre"]."  ".$row["$apellido"];
            echo "</option>";

        }
}

?>
    
</html>