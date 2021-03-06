<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accesorio</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
       <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body class="login-page">

   
   <div id="cuerpo" class="col-md-8" >
       
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Añadir Tipo de Accesorio</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                  
                   <div class="form-group">
                      <label for="marca">Tipo de Accesorio</label>
                      <input type="text" class="form-control input-md col-md-6 col-sm-7 col-xs-8" id="tipo_accesorio" name="marca" placeholder="cable, ups etc">
                    </div>
                     <hr>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                      <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg">   <span class="fa fa-list"></span>
                          Ver Listado </a>

                  </div>
                </form>
                
                <script> 
 
 $("#guardar").click(function()
        {
    var tipo_accesorio = $("#tipo_accesorio").val();

    
     
  if( tipo_accesorio.trim()=='')
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
                    tipo_accesorio:tipo_accesorio

                    
                },
                success: function(data)
                {
                    data=data.split("|");
                    $.each(data, function(i, item) {

                        if (item=="bien"){

                            toastr.success('Exito','se ha Guardado correctamnete');
                            limpiarcampos();
                        }
                        if (item=="mal"){
                            toastr.error('Error','Error Intente de nuevo');

                        }

                    });

                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                }
            })
     
     
 });
                    
    function limpiarcampos(){ document.getElementById("tipo_accesorio").value=""; }
 function goBack(){ setTimeout(function(){  window.location.href="ver_taccesorio.php";  }, 30); }

                </script>
                
                
              </div>
       </div>
   </div>
  

</body>
</html>