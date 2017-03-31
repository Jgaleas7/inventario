<?php 
include_once '../config/conexion2.php';

$id=$_GET['id'];
$mbd=DB::connect();DB::disconnect();
    $sql = "SELECT * FROM puesto WHERE id='$id'";
         $proof=$mbd->query("SELECT * from marca WHERE id_marca='$id'");
      foreach($proof as $row){
		  $row["id_marca"];
		  $row["nombre_marca"];
		  $row["descri"];
		
		  //var_dump($row["nombre"]);
	  }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MARCAS</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body>
<div class="">  
   
   <div id="cuerpo" class="col-md-8" >
       <header class="header">
       <center><strong><h1>EDITAR MARCAS</h1></strong></center>
       </header>
      
       
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"></h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                   <input type="hidden" value="<?php if (isset($row["id_marca"])) echo $row["id_marca"];?>"  class="form-control input-lg" id="id" name="area" >
                   <div class="form-group">
                      <label for="marca">MARCA</label>
                      <input type="text" value="<?php if (isset($row["nombre_marca"])) echo $row["nombre_marca"];?>"  class="form-control input-lg" id="marca" name="marca" placeholder="marca">
                    </div>
                    
                    <div class="form-group">
                      <label for="descripcion">descripcion</label>
                      <input type="text" value="<?php if (isset($row["descri"])) echo $row["descri"];?>"  class="form-control input-lg" id="descripcion" name="descripcion" placeholder="descrip">
                    </div>
                   
                
                     
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                    <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                  </div>
                </form>
                
                <script> 
 
 $("#guardar").click(function()
        {
    var marca = $("#marca").val();
    var descripcion= $("#descripcion").val();
    var id= $("#id").val();
    
    
     
  if(marca.trim()=='')
            {
               toastr.error("Hay campos que son obligatorios");
                return;
            }
            
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"editar",
                    marca:marca,
                    desc:descripcion,
                    id:id
                    
                },
                success: function(data)
                {
				
                  toastr.success('Exito','se ha Guardado correctamnete');
                    limpiarcampos();
					goBack();
                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                }
            })
     
     
 });
                    
    function limpiarcampos(){
        document.getElementById("marca").value="";
        document.getElementById("descripcion").value="";
        document.getElementById("id").value="";
        
    }
					         function goBack(){
             
           
             setTimeout(function(){  window.location.href="ver_tipo_clientes.php";  }, 30);
             
         }
                    
    </script>
                
                
              </div>
       </div>
   </div>
  

</body>
</html>