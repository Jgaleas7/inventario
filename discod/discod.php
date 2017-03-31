<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Disco Duro</title>
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
       <strong><h3 class="text-center">Unidad de Almacenamiento</h3></strong>
       </header>
      
       
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"></h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                  
                   <div class="form-group">
                      <label for="marca">Marca</label>
                       <select class="js-example-basic-multiple  form-control  help-block" id="marca" name="marca" required style="width: 95%" >
                           <?php cargaComboBox("SELECT * FROM `marca`","id_marca","nombre_marca","descri") ?>
                       </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="almacenamiento"> Almacenamiento</label>
                      <input type="text" class="form-control  input-sm " id="almacenamiento" name="almacenamiento" placeholder="almacenamiento del disco">
                    </div>

                     <div class="form-group">
                      <label for="cant_raid"> CantIDAD RAIDs</label>
                      <input type="text" class="form-control  input-sm  " id="cant_raid"  placeholder="cantidad de RAID">
                    </div>

                     <div class="form-group">
                      <label for="tipo">Tipo</label>
                      <input type="text" class="form-control  input-sm  " id="tipo"  placeholder="ejem estado solido">
                    </div>

                     <div class="form-group">
                      <label for="fecha">Fecha de compra</label>
                      <input type="date" class="form-control  input-sm " id="fecha"  placeholder="Fecha de Compra">
                    </div>

                     <div class="form-group">
                      <label for="obs">Fecha de compra</label>
                         <textarea type="date" class="form-control  input-sm " id="obs"  placeholder="Ejem buen estado"></textarea>
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
    var almacenamiento= $("#almacenamiento").val();
    var cant_raid= $("#cant_raid").val();
    var tipo= $("#tipo").val();
    var fecha= $("#fecha").val();
    var obs= $("#obs").val();

    
     
  if( marca.trim()=='')
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
                    marca:marca,
                    almacenamiento:almacenamiento,
                    cant_raid:cant_raid,
                    tipo:tipo,
                    fecha:fecha,
                    obs:obs
                    
                },
                success: function(data)
                {
					alert(data);
                  toastr.success('Exito','se ha Guardado correctamnete');
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
        document.getElementById("almacenamiento").value="";
        document.getElementById("tipo").value="";
        document.getElementById("fecha").value="";
        document.getElementById("obs").value="";
        document.getElementById("cant_raid").value="";


    }
							         function goBack(){
             
           
             setTimeout(function(){  window.location.href="ver_discod.php";  }, 30);
             
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