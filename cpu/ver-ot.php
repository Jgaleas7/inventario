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
   <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    

    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../plugins/datatables/jquery.dataTables.min.js" ></script>

    <script type="text/javascript" src="../plugins/datatables/tabla.min.js" ></script>


</head>

<body>
<nav>

</nav>
  <!-- modal para actualizar el estado -->
<div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Actualizar Estado de la Orden Trabajo</h4>
      </div>
      <div class="modal-body">
      
     <iframe src="editar.php"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar/Actualizar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

   <!-- cierra el modal -->


<div class="container-fluid">
    <h2>VER CPU
                        <a href="cpu.php" class="btn btn-success btn-md">
                            <span class="glyphicon glyphicon-plus"></span> Nuevo
                        </a>
                    </h2>
    <div class="row">
        <div class="col-lg-12"> <!-- Note that "m8 l9" was added -->
           
            
                    <table id="ver" class="display table responsive " cellspacing="0" width="100% ">
                <thead>
                   <tr>
                   
                  
                        <th  data-field="Id">Num Inventario</th>
                        <th data-field="Nombre">nombreEquipo</th>
                        <th data-field="modelo">modelo</th>
                        <th data-field="marca">marca</th>
                        <th  data-field="Edificio">Edificio</th>
                        <th data-field="telefono">estado</th>


                        <th  data-field="Editar">Editar</th>
                        <th  data-field="Eliminar">Eliminar</th>
                        <th  data-field="ver">Ver</th>

                                           
                    
                    </tr>
                               
                        </thead>
                <tbody>
                <?php
                include_once '../config/conexion2.php';
                // $cn = new conexion();
                $mbd=DB::connect();DB::disconnect();
                // VERDADERA
                $proof=$mbd->query("SELECT num_inventario, nombre_cpu, modelo, m.nombre_marca, id_edificio, estado  FROM cpu c INNER JOIN marca m ON c.marca=m.id_marca");


                while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>
                    
                   
                        <td>".$row["num_inventario"]."</td>
                        <td>".$row["nombre_cpu"]."</td>
                        <td>".$row["modelo"]."</td>
                        <td>".$row["nombre_marca"]."</td>
                        <td>".$row["id_edificio"]."</td>
                      
                        <td>".$row["estado"]."</td>
                    
                        
                        
                        <td>
                             <a href=\"editar_n.php?id=".$row["num_inventario"]."\" class=\"btn btn-info btn-sm\">
                                    <span class=\"glyphicon glyphicon-pencil\"></span>Editar
                              </a>
                               </td> 
                               
                               <td>
                             <a href=\"eliminar.php?id=".$row["num_inventario"]."\" class=\"btn btn-danger btn-sm\">
                                    <span class=\"glyphicon glyphicon-trash\"></span>Eliminar
                              </a>
                               </td>
                               <td>
                             <a  href=\"imprimir_cpu.php?id=".$row["num_inventario"]."\" class=\"btn btn-primary btn-sm\">
                                    <span class=\"glyphicon glyphicon-print\"></span>Imprimir
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
<script>
    $(document).ready(function(){
        
             $('#ver').DataTable();

        
    });

 </script>
</html>