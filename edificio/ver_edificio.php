<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MARCAS</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
     <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css" >
     <link rel="stylesheet" href="../css/toastr.css" >

    <!-- Optional theme -->
   <script src="../plugins/jQuery/jquery-3.1.1.js" type="text/javascript"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../plugins/datatables/jquery.dataTables.min.js" ></script>


</head>
<body>
<nav>

</nav>

<div class="container-fluid">
   <h2>Edificios
                        <a href="edificio.php" class="btn btn-success btn-md">
                            <span class="glyphicon glyphicon-plus"></span> Nuevo
                        </a>
                    </h2>
    <div class="row">
        <div class="col-lg-11"> <!-- Note that "m8 l9" was added -->
            <table id="ver" class="display table " cellspacing="0" >
                <thead>
                    
                    <tr>
                        <th data-field="id">id</th>
                        <th data-field="area">Edificio</th>

                        <th data-field="descripcion">Editar</th>
                    </tr>
                </thead> 
                <tbody>
                <?php
                 include_once '../config/conexion2.php';
               
              $mbd=DB::connect();DB::disconnect();
                // VERDADERA
             $proof=$mbd->query("select * from edificio");
                                   
           		
                while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>
                    
                        <td>".$row["id_edificio"]."</td>
                        <td>".$row["nombre_edificio"]."</td>
           
                        <td>
                             <a href=\"editar.php?id=".$row["id_edificio"]."\" class=\"btn btn-info btn-sm\">
                                    <span class=\"glyphicon glyphicon-pencil\"></span>Editar
                              </a></td>
                            
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
<script type="text/javascript" src="../plugins/datatables/tabla.min.js" ></script>
<script type="text/javascript" src="../js/bootbox.min.js" ></script>
<script type="text/javascript" src="../js/toastr.js" ></script>
           <script>
    $(document).ready(function(){
        
                $('#ver').DataTable();
        
    });
			   

    
 </script>
</html>