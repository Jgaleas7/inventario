<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <!-- Latest compiled and minified CSS -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >

           <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css" >
    <!-- Optional theme -->


    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../plugins/datatables/jquery.dataTables.min.js" ></script>
    <script type="text/javascript" src="../plugins/datatables/tabla.min.js" ></script>

</head>
<body>
<nav>

</nav>

<div class="container-fluid">
      <h2>Usuarios
                        <a href="usuario.php" class="btn btn-success btn-md">
                            <span class="glyphicon glyphicon-plus"></span>Nuevo
                        </a>
                        
                    </h2>
    <div class="row">
        <div class="col-lg-11"> <!-- Note that "m8 l9" was added -->
         <table id="ver" class="display table " cellspacing="0" >
                <thead>
                 
                                                              
                                                                 
                    <tr>
                        
                                         
                        <th data-field="empleado">empleado</th>
                        <th data-field="nombre">Nombre</th>
                       
                        
                    </tr>
                    
                <tbody> 
                <?php
               include_once '../config/conexion2.php';
               // $cn = new conexion();
              $mbd=DB::connect();DB::disconnect();
                // VERDADERA
             $proof=$mbd->query("select * from usuarios");
               
                                   
              

                while($row =$proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>
                    
                      
                        <td>".$row["id_usuario"]."</td>
                        <td>".$row["nombre_usu"]."</td>
                      
                        
                       
                            
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    
           <script>
    $(document).ready(function(){
        
                $('#ver').DataTable();
        
    });
    
    
 </script>
</body>
</html>