<?php 
include_once '../config/conexion2.php';

$id=$_GET['id'];
$mbd=DB::connect();DB::disconnect();
    //$sql = "SELECT * FROM tipo_accesorio WHERE id_taccesorio='$id'";
         $proof=$mbd->query("SELECT * from tipo_accesorio WHERE id_taccesorio='$id'");
      foreach($proof as $row){
		  $row["id_taccesorio"];
		  $row["tipo_accesorio"];

	  }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tipo Accesorio</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body>
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>
<div class="">

    <div id="cuerpo" class="col-md-8" >
        <header class="header">
            <center><strong><h2>Editar Tipo de Accesorio</h2></strong></center>
        </header>


        <div class="col-md-8 col-md-offset-3" >
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title"></h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">

<input type="hidden" id="id"  value="<?php if (isset($row["id_taccesorio"])) echo $row["id_taccesorio"];?>" >
                        <div class="form-group">
                            <label for="marca">Tipo de Accesorio</label>
                 <input type="text" class="form-control input-md col-md-6 col-sm-7 col-xs-8" id="tipo_accesorio" name="marca" value="<?php if (isset($row["tipo_accesorio"])) echo $row["tipo_accesorio"];?>" placeholder="cable, ups etc">
                        </div>
                        <hr>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                        <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                    </div>
                </form>
                
                <script> 
 
 $("#guardar").click(function()
        {
   var id_taccesorio= $("#id").val();
   var tipo_accesorio= $("#tipo_accesorio").val();

    
     
  if(tipo_accesorio.trim()=='')
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
                    id:id_taccesorio,
                    tipo_accesorio:tipo_accesorio

                    
                },
                success: function(data)
                {
				if(data=="bien"){
                    toastr.success('Exito','se ha Guardado correctamnete');
                    limpiarcampos();
                    goBack();

                }
                if(data=="Error"){
				    toastr.error("Error", "ha Ocurrido un error try again");
                    goBack();
                }

                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                }
            })
     
     
 });
                    
    function limpiarcampos(){ document.getElementById("tipo_accesorio").value=""; }
 function goBack(){ setTimeout(function () { window.location.href = "ver_taccesorio.php";  }, 30);}

                </script>
                
                
              </div>
       </div>
   </div>
  

</body>
</html>