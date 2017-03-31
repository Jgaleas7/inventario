<?php
include_once '../config/conexion.php';

$id=$_GET['id'];

    $sql = "SELECT * FROM puesto WHERE id='$id'";
         $proof=$mbd->query("SELECT * from tipos_clientes WHERE id='$id'");
      foreach($proof as $row){
		  $row["id"];
		
	  }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orden de Trabajo</title>
    <script src="../js/jquery-1.12.0.min.js" type="text/javascript"></script>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

      
    <link href="../font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet"> 
    
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootbox.js" type="text/javascript"></script>
   
</head>
<body>

 
 <form action="consultas.php" method="POST">
<input type="text" id="id" disabled>

</form>
 
</body>

<script type="text/javascript">
	bootbox.confirm("esta seguro que quiere este Cliente?", function(result) {
     if(result==true){
	        	//para eliminar un producto selected
		 toastr.success('Excelente', "eliminado correctamente");
		
			
           } return;}
	
	
    var estado2;                   
   function getestado(estado1){
            estado2= estado1;
            }
    $("#guardar").click(function()
        {
        var id = $("#id").val();
        alert(id);
        
         $.ajax({
                type:"POST",
                url:"../ots/consultas.php",
                data:
                {
                    tarea:"modificar",
                    id:id,
                    
                    estado: estado = estado2
                    
                  
                },
                success: function(data)
                {
                   
                    alert(data);
                    //colocar ensaje de exito
                    location.reload();
                   
                },
                error: function(xhr, ajaxOptions, thrownError)
                {
                    alert(thrownError);
                    alert("No funciona ajax para guardar");
                }
            })    
        
        
        
    });
    
    
    
    
    </script>





</html>