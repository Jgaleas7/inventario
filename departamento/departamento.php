<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Departamento</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../plugins/select2/select2.min.css" rel="stylesheet">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 

</head>
<body class="login-page">


   <div id="cuerpo" class="col-md-8" >

           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Añadir Departamento</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                  
                   <div class="form-group">
                      <label for="marca">Nombre Departamento</label>
                      <input type="text" class="form-control " id="departamento" placeholder="nombre departamento eje: Producion">
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                      <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg">   <span class="fa fa-list"></span>
                          Ver Departamentos</a>
                  </div>
                </form>
                  <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
                  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
                  <script src="../plugins/select2/select2.js" type="text/javascript"></script>
                  <script type="text/javascript" src="../js/toastr.js"></script>
                <script> 
 $(document).ready(function () {
     $("#edificio").select2();
 });

 $("#guardar").click(function()
        {

    var departamento= $("#departamento").val();


    
     
  if( departamento.trim()=='')
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
                    departamento:departamento,
                    edificio:edificio
                },
                success: function(data) {
                    data=data.split("|");
                    $.each(data, function(i, item) {

                        if (item=="bien"){

                            toastr.success('Exito','se ha Guardado correctamnete');
                            limpiarcampos();
                        }
                        if (item=="mal"){
                            toastr.error('Error','Intente de nuevo');

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
                    
    function limpiarcampos(){
        document.getElementById("departamento").value="";
    }
							         function goBack(){
             setTimeout(function(){  window.location.href="ver_departamento.php";  }, 30); }
                    
    </script>
                
                
              </div>
       </div>
   </div>
  

</body>

</html>