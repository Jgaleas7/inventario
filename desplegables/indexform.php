<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soportech </title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/custombox.min.css">
    <script type="text/javascript" src="../plugins/jQuery/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/custombox.min.js"></script>

</head>
<body class="login-page container-fluid">
<br>
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Todos los formularios</h3>
    </div>
    <div class="box-body">
        <a class="btn btn-app">
            <i class="fa fa-shopping-bag" id="marca"></i> MARCAS
        </a>
        <a class="btn btn-app">
            <i class="fa fa-building" id="ubicacion"></i> Departamento
        </a>

        <a class="btn btn-app">
            <i class="fa fa-credit-card" id="sim"></i> SIM
        </a>

        <a class="btn btn-app">
            <i class="fa fa-barcode" id="ip"></i> IP
        </a>

        <a class="btn btn-app">
            <i class="fa fa-cubes" id="tipo_accesorio"></i> Tipo Accesorio
        </a>
    </div>
    <!-- /.box-body -->
</div>
<div id="demo-marca" class="demo-modal" style="display: none">
    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close();">Close</button>
    <iframe src="../marca/marcas.php" width="600" height="600" id="fmarca" frameborder="0"></iframe>
</div>
<div id="demo-ubicacion" class="demo-modal" style="display: none">
    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close();">Close</button>
    <iframe src="../departamento/departamento" width="600" height="600" id="fmarca" frameborder="0"></iframe>
</div>

<div id="demo-sim" class="demo-modal" style="display: none">
    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close();">Close</button>
    <iframe src="../simcard/simcard.php" width="600" height="600" id="fmarca" frameborder="0"></iframe>
</div>

<div id="demo-accesorio" class="demo-modal" style="display: none">
    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close();">Close</button>
    <iframe src="../tipo_accesorio/tipo_accesorio.php" width="600" height="600" id="fmarca" frameborder="0"></iframe>
</div>

<div id="demo-ip" class="demo-modal" style="display: none">
    <button type="button" class="btn btn-lg btn-danger" onclick="Custombox.modal.close();">Close</button>
    <iframe src="../ipv4/ipv4.php" width="600" height="600" id="fmarca" frameborder="0"></iframe>
</div>



<script type="text/javascript">
    $("#marca").click(function () {
        var modal = new Custombox.modal({
            content: {

                target: '#demo-marca',
                effect: 'fall',
                fullscreen: true

            }
        });

        modal.open();
    });
    $("#ubicacion").click(function () {
        var modal = new Custombox.modal({
            content: {

                target: '#demo-ubicacion',
                effect: 'fall',
                fullscreen: true

            }
        });

        modal.open();
    });

    $("#sim").click(function () {
        var modal = new Custombox.modal({
            content: {

                target: '#demo-sim',
                effect: 'fall',
                fullscreen: true

            }
        });

        modal.open();
    });
    $("#ip").click(function () {
        var modal = new Custombox.modal({
            content: {

                target: '#demo-ip',
                effect: 'fall',
                fullscreen: true

            }
        });

        modal.open();
    });

    $("#tipo_accesorio").click(function () {
        var modal = new Custombox.modal({
            content: {

                target: '#demo-accesorio',
                effect: 'fall',
                fullscreen: true

            }
        });

        modal.open();
    });
</script>
</body>
</html>