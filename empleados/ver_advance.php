<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css" >
    <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css" >
    <script src="../plugins/jQuery/jquery-3.1.1.js"></script>


</head>
<style type="text/css">
    td.details-control {
        background: url('../images/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    tr.details td.details-control {
        background: url('../images/details_close.png') no-repeat center center;
    }
</style>
<body class="container-fluid" style="background-color: rgb(236, 240, 245);">
<h3>Empleados <a onclick="goBack()" class="glyphicon glyphicon-arrow-left btn bg-gray-active"> Regresar</a></h3>
<table  id="example" class="display table" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th></th>
        <th>Nombre</th>
        <th>Departamento</th>
        <th>Inventario CPU</th>

    </tr>
    </thead>

</table>

</body>
<script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../plugins/datatables/jquery.dataTables.min.js" ></script>
<script type="text/javascript" src="../plugins/datatables/tabla.min.js" ></script>
<script type="application/javascript">
    function format ( d ) {
        return 'Nombre cpu: '+d.nombre_cpu+' <br>'+
            'Inventario: '+d.id_numinventario+'<br>'+
            'Estado: '+d.estado+'<br>'+
            'Correo: '+d.correo+'<br>'+
            'Telefono: '+d.telefono+'<br>'+
            'Cantidad de CPU Asigandos: '+d.equipos+'<br>';
    }

    $(document).ready(function() {
        var dt = $('#example').DataTable( {

            "ajax": "reporte.php?ver=empleados",
            "columns": [
                {
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { "data": "NAME" },
                { "data": "nombre_dep" },
                { "data": "id_numinventario" }


            ],
            "order": [[1, 'asc']]
        } );

        // Array to track the ids of the details displayed rows
        var detailRows = [];

        $('#example tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                row.child( format( row.data() ) ).show();

                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on( 'draw', function () {
            $.each( detailRows, function ( i, id ) {
                $('#'+id+' td.details-control').trigger( 'click' );
            } );
        } );
    } );
    function goBack() {
        window.history.back();
    }
</script>
</html>