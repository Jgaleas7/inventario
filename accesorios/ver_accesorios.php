<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accesorios</title>
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
    <script type="text/javascript" src="../js/bootbox.js" ></script>
    <script type="text/javascript" src="../js/bootbox.min.js" ></script>
    <script type="text/javascript" src="../js/toastr.js" ></script>

</head>
<body>
<nav>

</nav>

<div class="container-fluid">
   <h2>Accesorios
                        <a href="accesorios.php" class="btn btn-success btn-md">
                            <span class="glyphicon glyphicon-plus"></span> Nuevo
                        </a>
                    </h2>
    <div class="row">
        <div class="col-lg-11"> <!-- Note that "m8 l9" was added -->
            <table id="ver" class="display table " cellspacing="0" >
                <thead>
                    
                    <tr>
                        <th data-field="Inventario">Inventario</th>
                        <th data-field="Tipo">Tipo</th>
                        <th data-field="Ubicacion">Ubicacion</th>
                        <th data-field="Marca">Marca</th>
                        <th data-field="Responsable">Responsable</th>
                        <th data-field="Editar">Editar</th>
                        <th data-field="Eliminar">Eliminar</th>

                    </tr>
                </thead> 
                <tbody>
                <?php
                 include_once '../config/conexion2.php';
               
              $mbd=DB::connect();DB::disconnect();
                // VERDADERA
             $proof=$mbd->query("SELECT id_accesorio, num_inventario, ta.tipo_accesorio, edificio.nombre_edificio, empleados.apellido, marca.nombre_marca FROM 
                                  accesorios acc INNER JOIN edificio ON ubicacion=edificio.id_edificio INNER JOIN tipo_accesorio ta ON acc.tipo=ta.id_taccesorio
                                  INNER JOIN empleados ON responsable=empleados.id INNER JOIN marca ON acc.marca=marca.id_marca");

           		
                while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>
                    
                        <td>".$row["num_inventario"]."</td>
                        <td>".$row["tipo_accesorio"]."</td>
                        <td>".$row["nombre_edificio"]."</td>
                        <td>".$row["nombre_marca"]."</td>
                        <td>".$row["apellido"]."</td>
      
                        <td>
                             <a href=\"editar.php?id=".$row["id_accesorio"]."\" class=\"btn btn-info btn-sm\">
                                    <span class=\"glyphicon glyphicon-pencil\"></span>Editar
                              </a></td><td>
							     <a id=\"eliminar\" value=\"".$row["id_accesorio"]."\" class=\"btn btn_5 btn-sm btn-danger\"  >Eliminar 											</a>
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
		$(".btn-danger").click(function(){
			
		        	var id=$(this).attr('value');
			
                bootbox.confirm("seguro que lo quiere eliminar?", function(result) {
	             if(result==true){
		                       eliminar(id);
	                     }

                        });


		});

        
    });
			   

    function eliminar (id){


        $.ajax(//funcion ajax le mando la tarea al switch y creo new variables que tienen el valor del form
            {
                type: "POST",
                url: "consultas.php",
                data: {
                    tarea: 'eliminar',
                    id: id
                   
                },
                success: function (data){

                    //alert(data);
					  location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });
    }

    
    
 </script>
</html>