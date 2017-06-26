<?php 
include_once '../config/conexion2.php';

$id=$_GET['id'];
$mbd=DB::connect();
         $proof=$mbd->query("SELECT * from marca WHERE id_marca='$id'");
      foreach($proof as $row){
		  $row["id_marca"];
		  $row["nombre_marca"];
	  }
$mbd=DB::disconnect();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marca</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/toastr.js"></script>
</head>
<body class="login-page">

<div class="">

    <div id="cuerpo" class="col-md-8" >

        <div class="col-md-8 col-md-offset-3" >
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Añadir Marca</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">

                        <input type="hidden" id="id" value="<?php if (isset($row["id_marca"])) echo $row["id_marca"]; ?>">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control input-md" id="marca" name="marca" value="<?php if (isset($row["nombre_marca"])) echo $row["nombre_marca"]; ?>" style="text-transform:uppercase" placeholder="DELL, ASUS etc">
                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" id="guardar" class="btn  btn-primary btn-flat btn-lg">Guardar</button>
                        <a  onclick="goBack()" class="btn bg-navy btn-flat btn-lg">   <span class="fa fa-list"></span>
                            Ver Marcas</a>
                    </div>
                </form>

                <script>


                    $("#guardar").click(function()
                    {
                        var marca = $("#marca").val();
                        var id = $("#id").val();

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
                                    tarea:"editar",
                                    marca:marca,
                                    id:id
                                },
                            success: function(data)
                            {
                                data=data.split("|");
                                $.each(data, function(i, item) {

                                    if (item=="bien"){

                                        toastr.success('Exito','se ha Guardado correctamnete');
                                        goBack();
                                    }
                                    if (item=="mal"){
                                        toastr.error('Error','vuelva intentarlo');
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


                    function goBack(){
                        setTimeout(function(){  window.location.href="ver_marcas.php";  }, 30);
                    }

                </script>


            </div>
        </div>
    </div>


</body>
</html>
