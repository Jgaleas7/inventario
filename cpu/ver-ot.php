<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver OTS</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css" >

    <!-- Optional theme -->
   <script src="../plugins/jQuery/jquery-3.1.1.js" type="text/javascript"></script>
</head>
<style type="text/css">

    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<body>

   <!-- cierra el modal -->
<div class="container-fluid">
    <h2>VER CPU
                        <a href="cpu.php" class="btn btn-flat btn-success btn-md">
                            <span class="glyphicon glyphicon-plus"></span> Nuevo
                        </a>
                    </h2>
    <div class="row">
        <div class="col-lg-12"> <!-- Note that "m8 l9" was added -->

                    <table id="ver" class="display table table-bordered " >
                <thead>
                   <tr>

                        <th  data-field="Inventario">Inventario</th>
                        <th data-field="Nombre">NombreEquipo</th>
                        <th data-field="modelo">Clasificacion</th>
                        <th data-field="marca">Depto</th>
                        <th data-field="estado">Ubicacion</th>
                        <th data-field="estado">Marca</th>

                        <th  data-field="Acciones">Acciones</th>
                    </tr>
                               
                 </thead>
                   <tfoot>
                   <tr>

                       <th  data-field="Inventario">Inventario</th>
                       <th data-field="Nombre">NombreEquipo</th>
                       <th data-field="modelo">Clasificacion</th>
                       <th data-field="marca">Depto</th>
                       <th data-field="estado">Ubicacion</th>
                       <th data-field="estado">Marca</th>

                       <th  data-field="Acciones">Acciones</th>
                   </tr>
                   </tfoot>
                <tbody>
                <?php
                include_once '../config/conexion2.php';
                $mbd=DB::connect();DB::disconnect();

                $proof=$mbd->query("SELECT id_increment, num_inventario, nombre_cpu, marca.nombre_marca, modelo, estado, (CASE WHEN clasificacion = 1 THEN \"render\" WHEN clasificacion = 2 THEN \"audio\" WHEN clasificacion = 3 THEN \"desktop\" WHEN clasificacion = 4 THEN \"Editora Movil\" WHEN clasificacion = 5 THEN \"ENL\" WHEN clasificacion = 6 THEN \"Generador Caracteres\" WHEN clasificacion = 7 THEN \"Loop\" WHEN clasificacion = 8 THEN \"prompter\" WHEN clasificacion = 9 THEN \"Servidor\" WHEN clasificacion = 10 THEN \"Visualizadoras\" WHEN clasificacion = 11 THEN \"Animacion\" WHEN clasificacion = 12 THEN \"Portatil\" WHEN clasificacion = 13 THEN \"Servidor Play-Out\" END) AS Clasificacion, nombre_dep, nombre_edificio FROM cpu 
                                    INNER JOIN detalle_cpu_empleados de ON cpu.num_inventario=de.id_numinventario 
                                    INNER JOIN empleados ON de.id_empleado=empleados.id INNER JOIN departamento depto ON empleados.id_departamento=depto.id_departamento 
                                    INNER JOIN edificio ON cpu.id_departamento=edificio.id_edificio 
                                    INNER JOIN marca ON cpu.marca=marca.id_marca GROUP BY num_inventario");


                while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>                        
                        
                        <td>".$row["num_inventario"]."</td>
                        <td>".$row["nombre_cpu"]."</td>
                        <td>".$row["Clasificacion"]."</td>
                        <td>".$row["nombre_dep"]."</td>             
                        <td>".$row["nombre_edificio"]."</td>
                        <td>".$row["nombre_marca"]."</td>
                      
                        <td>
                             <a href=\"editar_n.php?id=".$row["id_increment"]."\" class=\"btn btn-flat btn-info btn-sm\">
                                    <span class=\"glyphicon glyphicon-pencil\"></span></a>
                         
                             <a  class=\"btn btn-flat btn-danger btn-sm\">
                                    <span class=\"glyphicon glyphicon-trash\"></span> </a>
                              
                             <a  href=\"imprimir_cpu.php?id=".$row["num_inventario"]."\" class=\"btn btn-flat btn-primary btn-sm\">
                                    <span class=\"glyphicon glyphicon-eye-open\"></span></a>
                               </td>
                        
                    </tr>";
                }
                ?>

                </tbody>
            </table> 
        </div>
    </div>
    
    </div>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../plugins/datatables/jquery.dataTables.min.js" ></script>
<script type="text/javascript" src="../plugins/datatables/tabla.min.js" ></script>

<script>
    $(document).ready(function(){
             $('#ver').DataTable({
                 "initComplete": function() {

                     // $( ".dataTables_filter" ).append( '<button class="btn btn-primary paddingLeft" type="button" data-toggle="collapse" data-target="#table-show-options" aria-expanded="false" aria-controls="table-show-options">Optionen</button>' );
                     this.api().columns([2,3,4,5]).every( function () {
                         var column = this;
                         var select = $('<select><option class="form-control input-sm"  value=""></option></select>')
                             .appendTo($(column.footer()).empty() )
                             .on( 'change', function () {
                                 var val = $.fn.dataTable.util.escapeRegex(
                                     $(this).val()
                                 );

                                 column
                                     .search( val )
                                     .draw();
                             } );

                         column.data().unique().sort().each( function ( d, j ) {
                             select.append( '<option value="'+d+'">'+d+'</option>' )
                         } );
                     } );
                 }

             });
             });

      /*  $('#ver thead th').each( function () {

            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );

        // DataTable
        var table = $('#ver').DataTable();

        // Apply the search
        table.columns([2,3,4]).every( function () {
            var that = this;

            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    });*/

 </script>
</html>