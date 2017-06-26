<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Disco Duro</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
     <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
       <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body class="login-page">
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>
<div class="">  
   
   <div id="cuerpo" class="col-md-8" >

           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Añadir unidad de Almacenamiento</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">

                     <div class="form-group">
                      <label for="almacenamiento">Capacidad</label>
                      <input type="text" class="form-control  input-sm " id="almacenamiento" name="almacenamiento" placeholder="Capacidad eje: 3TB">
                    </div>

                     <div class="form-group">
                      <label for="tipo">Tipo de Arreglo</label>
                         <select name="tipo" class="form-control" id="tipo">
                             <option value="na">No Aplica</option>
                             <option value="r0">RAID 0</option>
                             <option value="r1">RAID 1</option>
                             <option value="r5">RAID 5</option>
                             <option value="r10">RAID 10</option>
                         </select>
                    </div>

                     <div class="form-group">
                      <label for="cantidad">Cantidad de discos</label>
                      <input type="number" class="form-control  input-sm " id="cantidad"  placeholder="eje: 3">
                    </div>

                     <div class="form-group">
                      <label for="obs">Descripcion de Discos</label>
                         <textarea  class="form-control  input-sm " id="obs"  placeholder="Ejem 2TB, 2TB, 4TB"></textarea>
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

    var almacenamiento= $("#almacenamiento").val();
    var cantidad= $("#cantidad").val();
    var tipo= $("#tipo").val();
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
                    almacenamiento:almacenamiento,
                    cantidad:cantidad,
                    tipo:tipo,
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
</html>