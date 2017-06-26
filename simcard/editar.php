<?php 
include_once '../config/conexion2.php';

$id=$_GET['id'];
$mbd=DB::connect();DB::disconnect();

         $proof=$mbd->query("SELECT * from simcard WHERE id_sim='$id'");
      foreach($proof as $row){
		  $row["id_sim"];
		  $row["imei"];
		  $row["numero"];
		  $row["compania"];
		  $row["conectividad"];
	  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sim Card</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body class="login-page">


<div id="cuerpo" class="col-md-12" >

    <div class="col-md-11 " >
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Sim Card</h2>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <input type="hidden" id="id" value="<?php if (isset($row["id_sim"])) echo $row["id_sim"];?>">
                    <div class="row col-md-12 col-sm-8 col-lg-12">
                        <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                            <label for="imei">IMEI*</label>
                            <input type="text" class="form-control input-sm help-block" value="<?php if (isset($row["imei"])) echo $row["imei"];?>" id="imei" name="nombre" placeholder="IMEI">
                        </div>



                        <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                            <label for="usuario">Numero</label>
                            <input type="number" class="form-control input-sm  help-block" value="<?php if (isset($row["numero"])) echo $row["numero"];?>" id="numero" name="usuario" placeholder="Numero del sim">
                        </div>
                    </div>

                    <div class="row col-md-12 col-sm-11 col-lg-12">

                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label for="pass">Compañia</label>
                            <input type="text" class="form-control input-sm  help-block" value="<?php if (isset($row["compania"])) echo $row["compania"];?>" id="compania" name="pass" placeholder="Ejem Tigo, claro">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label for="conectividad">Conectividad</label>
                            <select id="conectividad" class="form-control input-sm  help-block">
                                <option <?php if (isset($row["conectividad"]) && $row["conectividad"]=="3g") echo "selected";?> value="3g">3G</option>
                                <option <?php if (isset($row["conectividad"]) && $row["conectividad"]=="4g") echo "selected";?>  value="4g">4G</option>

                            </select>
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer col-lg-4 col-xs-12 col-md-6">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                    <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg">   <span class="fa fa-list"></span>
                        Ver SIM</a>
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

                    var imei= $("#imei").val();
                    var numero= $("#numero").val();
                    var compania= $("#compania").val();
                    var conectividad= $("#conectividad").val();
                    var id= $("#id").val();


                    if( numero.trim()=='') { toastr.error("El numero es obligatorio"); return;  }
                    if( imei.trim()=='') { toastr.error("El imei es obligatorio"); return;  }

                    $.ajax({
                        type:"POST",
                        url:"consultas.php",
                        data:
                            {
                                tarea:"editar",
                                imei:imei,
                                numero:numero,
                                compania:compania,
                                conectividad:conectividad,
                                id:id
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
                                    toastr.error('Error','Vuelva Intentar por Favor');

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
                    document.getElementById("nombre").value="";
                    document.getElementById("numero").value="";
                    document.getElementById("imei").value="";
                    document.getElementById("compania").value="";

                }
                function goBack(){
                    setTimeout(function(){  window.location.href="ver_simcard.php";  }, 30); }

            </script>

        </div>
    </div>
</div>


</body>
</html>
