<?php 
      include_once '../config/conexion2.php';
 $mbd=DB::connect();DB::disconnect();
            $id = $_GET['id'];
            $proof=$mbd->query("SELECT * from empleados WHERE id='$id'");
      foreach($proof as $row){
		  $row["nombre"];
		  $row["apellido"];
		  $row["telefono"];
		  $row["id"];
		  $row["correo"];
		  $row["id_departamento"];
	  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empleados</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="login-page">




<div class="col-md-8 col-md-offset-3" >
    <section class="content-header">
        <h1>
            Empleados
            <small>Editar Empleado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a >Empleados</a></li>
            <li class="active">Editar Empleado</li>
        </ol>
    </section>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title">Editar Empleado</h2>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <input type="hidden" id="id" value="<?php if(isset($row["id"])) echo $row["id"]; ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control input-md" id="nombre" value="<?php if(isset($row["nombre"])) echo $row["nombre"]; ?>" name="nombre" required placeholder="Nombre">
                </div>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control input-md" value="<?php if(isset($row["apellido"])) echo $row["apellido"]; ?>" id="apellido" name="apellido" required placeholder="Apellido">
                </div>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <input type="text" class="form-control input-md" value="<?php if(isset($row["telefono"])) echo $row["telefono"]; ?>" id="telefono" name="telefono"  placeholder="Telefono">
                </div>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <input type="text" class="form-control input-md" value="<?php if(isset($row["correo"])) echo $row["correo"]; ?>" id="correo"  placeholder="Correo">
                </div>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <select  id="departamento" class="form-control">
                        <?php
                        $mbd=DB::connect();DB::disconnect();
                        $proof1=$mbd->query("SELECT id_departamento, nombre_dep FROM departamento");
                        while($row1 = $row1 = $proof1->fetch(PDO::FETCH_ASSOC)){
                            if($row1["id_departamento"] == $row["id_departamento"])
                            { echo "<option selected value=".$row["id_departamento"].">".$row1["nombre_dep"]."</option>"; }
                            else
                            { echo "<option value=".$row1["id_departamento"].">".$row1["nombre_dep"]."</option>"; }
                        }
                        ?>
                    </select>
                     </div>
            </div>


        </div><!-- /.box-body -->

        <div class="box-footer ">
            <button type="button" id="guardar" class="btn   btn-primary btn-lg btn-flat">Guardar</button>
            <a  onclick="goBack()" class="btn bg-navy btn-lg btn-flat">   <span class="glyphicon glyphicon-list"></span>
                Ver Empleados</a>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
<script type="text/javascript" href="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../js/toastr.js"></script>
<script>
$(document).ready(function () {
    $("select").select2();
});

    $("#guardar").click(function()
    {
        var telefono = $("#telefono").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var correo = $("#correo").val();
        var id = $("#id").val();
        var departamento = $("#departamento").val();

        if( nombre.trim()=='' && apellido.trim()=='')
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
                    telefono:telefono,
                    nombre:nombre,
                    apellido: apellido,
                    correo: correo,
                    id:id,
                    departamento:departamento

                },
            success: function(data)
            {
                data=data.split("|");
                $.each(data, function(i, item) {

                    if (item=="bien"){

                        toastr.success('Exito','se ha Guardado correctamnete');
                        limpiarcampos();
                        goBack();
                    }
                    if (item=="mal"){
                        toastr.error('Error','Ya Existe esa Ip');

                    }

                });
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                alert(thrownError);
                toast.error("No funciona ajax para guardar");
            }
        })
    });
    function limpiarcampos(){
        document.getElementById("telefono").value="";
        document.getElementById("nombre").value="";
        document.getElementById("apellido").value="";
        document.getElementById("correo").value="";

    }
    function goBack(){
        setTimeout(function(){  window.location.href="ver_empleados.php";  }, 30);

    }

</script>



</body>


</html>