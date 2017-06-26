<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ram</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
     <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="login-page container">
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>


       <div class="box box-primary">
           <div class="box-header with-border">
               <h2 class="box-title">Añadir Ram</h2>
           </div><!-- /.box-header -->

                <!-- form start -->
                <form role="form">
                    <div class="box-body">

                     <div class="row col-md-12 col-lg-12">
                         <div class="form-group col-md-6 col-sm-6 col-xs-10 ">

                      <label for="voltage">Voltage</label>
                      <input type="text" class="form-control input-sm help-block" id="voltage" name="voltage" placeholder="Ejem 120 v">
                    </div>

                         <div class="form-group col-md-6 col-sm-6 col-xs-10 ">
                      <label for="voltage"> Capacidad</label>
                      <input type="text" class="form-control input-sm help-block" id="capacidad" name="capacidad" placeholder="Ejem 8 MG">
                    </div>
                     </div>

                     <div class="row col-md-12 col-lg-12">
                         <div class="form-group col-md-6 col-sm-6 col-xs-10 ">
                      <label for="voltage"> Tipo de RAM</label>
                      <input type="text" class="form-control input-sm help-block" id="tipo" name="tipo" placeholder="Ejem DDR, DDR2">
                    </div>

                         <div class="form-group col-md-6 col-sm-6 col-xs-10 ">
                      <label for="num_modulos"> Numero de Modulos</label>
                      <input type="text" class="form-control input-sm help-block" id="num_modulos" name="num_modulos" placeholder="numero de modulos">
                    </div>
                     </div>
                     <div class="row col-md-12 col-lg-12">
                         <div class="form-group col-md-6 col-sm-6 col-xs-10 ">
                      <label for="frecuencia"> Frecuencia de Ram</label>
                      <input type="text" class="form-control input-sm help-block" id="frecuencia" name="frecuencia" placeholder="Ejem 20 MGHZ">
                    </div>
                    </div>


       </div><!-- /.box-body -->

       <div class="box-footer">
           <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
           <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
       </div>
                </form>
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>

                <script>

 $("#guardar").click(function()
        {
    var voltage = $("#voltage").val();
    var capacidad = $("#capacidad").val();
    var tipo = $("#tipo").val();
    var num_modulos = $("#num_modulos").val();
    var frecuencia = $("#frecuencia").val();




  if( capacidad.trim()=='')
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
                    voltage:voltage,
                    capacidad:capacidad,
                    tipo:tipo,
                    num_modulos:num_modulos,
                    frecuencia:frecuencia


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
        document.getElementById("voltage").value="";
        document.getElementById("capacidad").value="";
        document.getElementById("tipo").value="";
        document.getElementById("num_modulos").value="";
        document.getElementById("frecuencia").value="";

    }
							         function goBack(){


             setTimeout(function(){  window.location.href="ver_ram.php";  }, 30);

         }

    </script>


              </div>
       </div>
   </div>


</body>
</html>