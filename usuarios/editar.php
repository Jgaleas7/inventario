<?php
$id = $_GET['id'];
$sql = "SELECT pu.area, fecha, lu.lugar, materiales, descripcion_trabajo, vehiculo, ot.kilometraje from ordentrabajo ot inner join lugares lu on ot.lugar=lu.id  inner join puesto pu on ot.area=pu.id where ot.id_ot = '$id'";

include_once '../config/conexion.php';
//$cn = new conexion();

$row = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($row);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orden de Trabajo</title>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
         <link href="../plugins/select2/select2.css" rel="stylesheet"> 

    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
    
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.full.js" type="text/javascript"></script>
    <script src="../plugins/select2/select2.js" type="text/javascript"></script>
</head>
<body>
<div class="">  
   <div id="menu" class="menu">
       <?php
       // include("../menu_prueba.html");
        ?>
   </div>
   
   <div id="cuerpo" class="col-md-8" >
       <header class="header">
       <center><strong><h1> Crear Nueva Orden de Trabajo</h1></strong></center>
       </header>
      
       
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"></h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  

                        </div>
                        <input type="hidden" class="form-control input-lg" id="usuario" name="usuario">
                        </div>
                    
                  
                    <div class="form-group">
                      <label for="saldo">Area</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" value="<?php echo $row[0];?>" class="form-control input-lg" id="area" name="area"  >
                        </div>
                    </div>
                    
                     <div class="form-group">
                   <label for="fecha">Fecha</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" value="<?php echo $row[1];?>" class="form-control" id="fecha" name="fecha">
                    </div><!-- /.input group -->
                  </div>
                     
              
                     <div class="form-group">
                      <label for="lugar">Lugar y Central</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-male"></i>
                        </div>
                       
                        <select class="form-control input-lg" value="<?php echo $row[2];?>" id="lugar" name="lugar" > 
                          <?php cargaComboBox("SELECT * FROM `lugares`","id","lugar","central") ?> 
                        
                        
                        </select>
                       
                        </div>
                    </div>
                    
                       
                     <label for="emp">Empleados</label>  
                <select class="js-example-basic-multiple select2 input-lg form-control " id="emp" name="emp"  multiple="multiple"> 
                        <?php cargaComboBox("SELECT * FROM `empleados`","numempleado","nombre","apellido") ?> 
                        
                        </select><hr>
                       
                      
                    
                  
                  
                   <div class="form-group">
                      <label for="descripcion_trabajo">Descripcion del Trabajo a Realizar</label>
                        <textarea type="text"  class="form-control input-lg" id="descripcion_trabajo" name="descripcion_trabajo" placeholder="Descripcion del trabajo"><?php echo $row[4];?></textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="numeroC">Materiales a Utilizar</label>
                        <textarea type="text" class="form-control input-lg" id="materiales" name="materiales"  placeholder="Materiales a Utilizar"><?php echo $row[3];?></textarea>
                    </div>
                   
                      <div class="form-group">
                      <label for="puntos">Vehiculo</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-male"></i>
                        </div>
                       
                        <select class="form-control input-lg" id="vehiculo" name="vehiculo" value="<?php echo $row[5];?>">
                        
                           <?php cargaComboBox("SELECT * FROM `vehiculo`","id","marca","placa") ?> 
                          
                            </select>
                       
                        </div>
                        
                        <div class="form-group">
                      <label for="numeroC">Kilometraje</label>
                        <textarea type="text" class="form-control input-lg" id="kilometraje" name="kilometraje" placeholder="Kilometraje actual del vehiculo"><?php echo $row[6];?></textarea>
                        </div>
                   
                        
                    </div>
                    <div class="box-footer">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                  </div>
                    
                  </div><!-- /.box-body -->

                  
                </form>
              </div>
       </div>
   </div>
  

</body>

<script type="text/javascript" >

$(document).ready(function(){
    
    $("#emp").select2();
  
    
});

</script>


<?php 	
function cargaComboBox($consul,$id,$nombre, $apellido)
    {
     include('../config/conexion.php');
        $resul=mysqli_query($mysqli,$consul);
        while ($row=mysqli_fetch_array($resul)) 
        {
            echo "<option value='".$row[$id]."'>";
            echo $row[$nombre]."  ".$row[$apellido];
            echo "</option>";

        }
}

?>
</html>