<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T Video</title>
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
   <h2>Tarjeta de Video
                        <a href="tvideo.php" class="btn btn-success btn-md">
                            <span class="glyphicon glyphicon-plus"></span> Nuevo
                        </a>
                    </h2>
    <div class="row">
        <div class="col-lg-11"> <!-- Note that "m8 l9" was added -->
            <table id="ver" class="display table " cellspacing="0" >
                <thead>
                    
                    <tr>
                        <th data-field="ID">ID</th>
                        <th data-field="MARCA">MARCA</th>
                        <th data-field="MEMORIA">MEMORIA</th>
                        <th data-field="MODELO">MODELO</th>
                        <th data-field="Editar">Editar</th>

                       
                        
                        
                       
                    </tr>
                </thead> 
                <tbody>
                <?php
                 include_once '../config/conexion2.php';
               
              $mbd=DB::connect();DB::disconnect();
                // VERDADERA
             $proof=$mbd->query("SELECT  id_tvideo, m.nombre_marca, memoria, modelo FROM tarj_video tv INNER JOIN marca m ON tv.marca=m.id_marca  ");
                                   
           		
                while($row = $row = $proof->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    
                    <tr>
                    
                        <td>".$row["id_tvideo"]."</td>
                        <td>".$row["nombre_marca"]."</td>
                        <td>".$row["memoria"]."</td>
                        <td>".$row["modelo"]."</td>
                       
                        
                        
                        <td>
                             <a href=\"editar.php?id=".$row["id_tvideo"]."\" class=\"btn btn-info btn-sm\">
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
           <script>
    $(document).ready(function(){
        
                $('#ver').DataTable();
		$(".btn-danger").click(function(){
			
		        	var id=$(this).attr('value');
			
                bootbox.confirm("seguro que lo quiere eliminar?", function(result) {
	             if(result==true){
		                     eliminar(id);
	                     }

});   });
        
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