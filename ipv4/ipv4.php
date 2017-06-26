<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ip</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
       <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
       <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body class="login-page">

<div class="">  
   
   <div id="cuerpo" class="col-md-8" >
       <header class="header">
       <center><strong><h1>Añadir IP</h1></strong></center>
       </header>
      
       
           <div class="col-md-8 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"></h2>
                </div>
                <form role="form">
                 <div class="box-body">
                  
                  
                   <div class="form-group">
                      <label for="ip">Direccion Ip</label>
                      <input type="text" class="form-control input-lg" id="ip" name="IP" placeholder="ip">
                    </div>
                    

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                      <a  onclick="goBack()" class="btn bg-navy btn-flat btn-lg">   <span class="fa fa-list"></span>
                          Ver IP</a>
                  </div>
                </form>
                
                <script>
                    $(document).ready(function () {

                    });
 
 $("#guardar").click(function()
        {
    var ip = $("#ip").val();

            //validar ip en un formato correcto
            var ipformat = /^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/;
            ipformat = /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/;
            if(ip.match(ipformat))
            {
           toastr.success("Correcto","You have entered valid IP address!.");

            }
            else
            {
              toastr.error("Error","Has ingresado una IP invalida!");
                return;
            }


            if( ip.trim()=='')
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
                    ip:ip
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
                            toastr.error('Error','Ya Existe esa Ip');

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
        document.getElementById("ip").value="";

        
    }
							         function goBack(){
             
           
             setTimeout(function(){  window.location.href="ver_ip.php";  }, 30);
             
         }


                </script>
                
                
              </div>
       </div>
   </div>
  

</body>
</html>