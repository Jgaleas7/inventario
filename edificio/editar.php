<?php 
include_once '../config/conexion2.php';

$id=$_GET['id'];
$mbd=DB::connect();DB::disconnect();

         $proof=$mbd->query("SELECT * from edificio WHERE id_edificio='$id'");
      foreach($proof as $row){
		  $row["id_edificio"];
		  $row["nombre_edificio"];


	  }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edificio</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../plugins/select2/select2.css" rel="stylesheet">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="login-page">



<div id="cuerpo" class="col-md-8" >


    <div class="col-md-8 col-md-offset-3" >
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Editar Edificio</h2>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <input type="hidden" id="id" value="<?php if (isset($row["id_edificio"])) echo $row["id_edificio"]?>">

                    <div class="form-group">
                        <label for="edificio">Edificio</label>
                        <input type="text" class="form-control " id="edificio" value="<?php if (isset($row["nombre_edificio"])) echo $row["nombre_edificio"]?>" name="edificio" placeholder="edificio">
                    </div>

                    <hr>


                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" id="guardar" class="btn btn-flat  btn-primary btn-lg">Guardar</button>
                    <a  onclick="goBack()" class="btn btn-flat bg-navy btn-lg">   <span class="fa fa-list"></span>
                        Ver Edificios</a>
                </div>
            </form>




        </div>
    </div>
</div>


</body>
<script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/select2/select2.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/toastr.js"></script>
<script>
    $(document).ready(function () {
        $("#departamento").select2();

    });

    $("#guardar").click(function()
    {

        var edificio= $("#edificio").val();
        var id= $("#id").val();



        if( edificio.trim()=='')
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

                    edificio:edificio,
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
        document.getElementById("edificio").value="";

    }
    function goBack(){


        setTimeout(function(){  window.location.href="ver_edificio.php";  }, 30);

    }

</script>
<?php
function cargaComboBox($consul,$id,$nombre)
{
    include('../config/conexion2.php');

    $mbd=DB::connect();DB::disconnect();
    $proof=$mbd->query($consul);
    while ($row = $proof->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='".$row["$id"]."'>";
        echo $row["$nombre"];
        echo "</option>";

    }

}


?>
</html>