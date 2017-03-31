<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sim Card</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
       <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body>
<a  onclick="goBack()" class="btn btn-warning btn-lg">   <span class="glyphicon glyphicon-circle-arrow-left"></span>
Regresar</a>
<div class="">  
   
   <div id="cuerpo" class="col-md-8" >
       <header class="header ">
       <strong><h2 class="col-lg-offset-5">Añadir Sim Card</h2></strong>
       </header>
      
       
           <div class="col-md-11 col-md-offset-3" >
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"></h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 <div class="box-body">
                  
                  <div class="row col-md-12 col-sm-8 col-lg-12">
                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="imei">IMEI*</label>
                          <input type="text" class="form-control input-sm help-block" id="imei" name="nombre" placeholder="IMEI">
                      </div>

                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control input-sm  help-block" id="nombre" name="fabricante" placeholder="Nombre">
                      </div>

                      <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                          <label for="usuario">Numero</label>
                          <input type="number" class="form-control input-sm  help-block" id="numero" name="usuario" placeholder="Numero del sim">
                      </div>
                  </div>

                     <div class="row col-md-12 col-sm-11 col-lg-12">

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                          <label for="pass">Compañia</label>
                          <input type="text" class="form-control input-sm  help-block" id="compania" name="pass" placeholder="Ejem Tigo, claro">
                      </div>

                         <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                             <label for="conectividad">Conectividad</label>
                             <select id="conectividad" class="form-control input-sm  help-block">
                                 <option value="3g">3G</option>
                                 <option value="4g">4G</option>

                             </select>
                         </div>
                  </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer col-lg-4 col-xs-12 col-md-6">
                    <button type="button" id="guardar" class="btn  btn-primary btn-lg">Guardar</button>
                    <button type="reset" class="btn  btn-danger btn-lg">Cancelar</button>
                  </div>
                </form>
                
                <script>
                    $("#numero").keyup(function() {
                        this.value = (this.value + '').replace(/[^0-9]/g, '');

                    });
                    $("#numero").focusout(function() {
                        this.value = (this.value + '').replace(/[^0-9]/g, '');

                    });


 
 $("#guardar").click(function()
        {
    var nombre = $("#nombre").val();
    var imei= $("#imei").val();
    var numero= $("#numero").val();
    var compania= $("#compania").val();
    var conectividad= $("#conectividad").val();


    
     
  if( numero.trim()=='')
            {
               toastr.error("El numero es obligatorio");
                return;
            }
            
            $.ajax({
                type:"POST",
                url:"consultas.php",
                data:
                {
                    tarea:"guardar",
                    nombre:nombre,
                    imei:imei,
                    numero:numero,
                    compania:compania,
                    conectividad:conectividad

                },
                success: function(data)
                {
				if(data=="bien"){
                    toastr.success('Exito','se ha Guardado correctamnete');
                    limpiarcampos();
                }else{
				    toastr.error("ERROR", "Ha ocurrido un Error");
                }

                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                }
            })
     
     
 });
                    
    function limpiarcampos(){
        document.getElementById("nombre").value="";
        document.getElementById("numero").value="";
        document.getElementById("imei").value="";
        document.getElementById("compania").value="";

    }
							         function goBack(){
             
           
             setTimeout(function(){  window.location.href="ver_licencias.php";  }, 30);
             
         }
                    
    </script>
                
                
              </div>
       </div>
   </div>
  

</body>
</html>