<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SimCard</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="../css/toastr.css" >

    <!-- Optional theme -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../plugins/datatables/jquery.dataTables.min.js" ></script>
    <script type="text/javascript" src="../plugins/datatables/tabla.min.js" ></script>


</head>
<body>
<nav>

</nav>

<div class="container-fluid">
    <h2>Sim Card </h2>
    <div class="row">
        <div class="col-lg-11"> <!-- Note that "m8 l9" was added -->
            <input type="hidden" class="" id="valor">

            <table id="ver" class="display table " cellspacing="0" >
                <thead>

                <tr>
                    <th class="hidden" data-field="Id">Id</th>
                    <th data-field="nombre">IMEI</th>
                    <th data-field="Cantidad">Numero</th>
                    <th data-field="fecha">Comapañia</th>
                    <th data-field="Fabricante">Conectividad</th>

                </tr>
                </thead>
                <tbody>
                <?php
                include_once '../config/conexion2.php';

                $mbd=DB::connect();DB::disconnect();
                // VERDADERA
                $proof=$mbd->query("SELECT * FROM simcard  WHERE simcard.id_sim NOT IN (SELECT id_sim FROM detalle_sim )");


                while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>
                        <td class='hidden'>".$row["id_sim"]."</td>
                        <td>".$row["imei"]."</td>
                        <td>".$row["numero"]."</td>
                        <td>".$row["compania"]."</td>
                        <td>".$row["conectividad"]."</td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../js/bootbox.js" ></script>
<script type="text/javascript" src="../js/bootbox.min.js" ></script>
<script type="text/javascript" src="../js/toastr.js" ></script>
<script>
    $(document).ready(function(){

        $('#ver').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false
        });
        $("#ver tbody ").on('click', 'tr' , function(){
            var table=  $('#ver').DataTable();
           // var id=$(this).attr('value');
            //$("#valor").val(id);

            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                var datos=table.row( this ).data();
                $("#valor").val(datos);

            }

        });

    });






</script>
</html>