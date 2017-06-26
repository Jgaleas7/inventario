<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Licencias</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
     <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css" >
     <link rel="stylesheet" href="../css/toastr.css" >

    <!-- Optional theme -->
   <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>



</head>
<body>
<nav>

</nav>

<div class="container-fluid">
   <h2>Router/Switch
                        <a href="swt_rt.php" class="btn btn-success btn-md">
                            <span class="glyphicon glyphicon-plus"></span> Nuevo
                        </a>
                    </h2>
    <div class="row">
        <div class="col-lg-11"> <!-- Note that "m8 l9" was added -->
            <table id="ver" class="display table " cellspacing="0" >
                <thead>
                    
                    <tr>

                        <th data-field="Inventario">Inventario</th>
                        <th data-field="Nombre">Nombre</th>
                        <th data-field="Red">Red</th>
                        <th data-field="Tipo">Tipo</th>
                        <th data-field="Ubicacion">Ubicacion</th>
                        <th data-field="Acciones">Acciones</th>
                    </tr>
                </thead> 
                <tbody>
                <?php
                 include_once '../config/conexion2.php';
               
              $mbd=DB::connect();DB::disconnect();
                // VERDADERA
             $proof=$mbd->query("SELECT swt_rt.*, nombre_dep  FROM swt_rt INNER JOIN departamento ON swt_rt.ubicacion=id_departamento");
                                   
           		
                while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>
                        <td>".$row["num_inventario"]."</td>
                        <td>".$row["nombre"]."</td>
                        <td>".$row["red_fisica"]."</td>
                        <td>".$row["tipo"]."</td>                       
                        <td>".$row["nombre_dep"]."</td>                       
                        <td>
                             <a href=\"editar.php?id=".$row["id_swt_rt"]."\" class=\"btn btn-info btn-sm\">
                                    <span class=\"glyphicon glyphicon-pencil\"></span>
                              </a>
							     <a   class=\"btn btn_5 btn-sm btn-danger\"  ><span class=\"glyphicon glyphicon-trash\"></span>
							     	</a>
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

<script type="text/javascript" src="../js/bootbox.min.js" ></script>
<script type="text/javascript" src="../js/toastr.js" ></script>
           <script>
    $(document).ready(function(){
                $('#ver').DataTable();
    });

    
    
 </script>
</html>