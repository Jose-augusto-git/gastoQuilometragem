<?php

session_start();
include_once("private/connection/conexao.php");
/*require_once 'calcular.php';*/
if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
    require("acoes/conexao.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
}else{
    echo "<script>window.location = 'index.php'</script>";
}




?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos <?php echo $nome; ?> </title>

    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
</head>
<body>


</body>
</html>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">		
		<link rel="stylesheet" type="text/css" href="css/servico.css">     
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/servico.css">
	</head>

	<body>
   
    <div class="container">    
        <div class="row">
 
  

 

            <form id="form1" name="form1" action="bd-insert.php "  method="POST">
            <div class="card">
            <div class="card-header">
                CALCULO DE QUILOMETRAGEM
            </div>
            <div class="card-body">

                <div class="form-group pt-2">

                    <input type="text" class="form-control" placeholder="KM/INICIAL" name="km_inicio"  id="km_inicio" require>
                </div>

                <div class="form-group pt-2">
                    
                    <input type="text" class="form-control" id="" placeholder="KM/FINAL" name="km_final" id="km_final" require>
                </div>






                <div class="form-group pt-2">
                <input require class="form-control" type="text" name="km_gasto" id="resultado" onclick="javascript:verificar();" placeholder="KM/GASTO"  >
                <div class="form-group">
                    <label class="text-center" for="fonte"> Fonte </label>
                    <input  type="text" class="form-control" name="fonte" 
                        value="<?php echo $row_usuario['fonte'];?>"required>
                    </div>
                </div>

                <div class="form-group pt-2">
                <input require class="form-control " type="date" name="data" id="data">
                </div>

                <button type="submit" class=" btn btn-success btn-lg font-weight-light"><i class="fas fa-save"></i></button>
                <a href="teste.php" class=" btn btn-success btn-lg font-weight-light"><i class="fas fa-file-excel"></i></a>
                <a   href="acoes/logout.php" class="btn btn-danger btn-lg font-weight-light "><i class="fas fa-times-circle"></i> </a> 
                <br>
               
                </div>
            </div><br>
            </form>







<div class="input-group-append">
				
					
<?php
                            
    $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
    if($SendPesqUser){
        $quilometro = filter_input(INPUT_POST, 'quilometro', FILTER_SANITIZE_STRING);
        $result_usuario = "SELECT * FROM quilometro WHERE data";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){ ?>

<td><?php  echo $row_usuario['km_inicio']; ?></td>

<td><?php echo $row_usuario['km_final'];?></td>
<td><?php echo $row_usuario['km_gasto'];?></td>
<td><?php echo $row_usuario['data'];?></td>

<?php             
        }
    }
?>



    

        
        <table class="table table-dark ">
        <thead>
            <tr>


            <th scope="col" class="d-none">ID</th>
            <th scope="col">KM Rodados Inicio</th>
            <th scope="col">KM Rodados Final</th>
            <th scope="col">KM Total Gastos</th>
            <th scope="col">Data</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            <tr>

           <?php
           $result_usuario = "SELECT * FROM  quilometro";
           $resultado_usuario = mysqli_query($conn, $result_usuario);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){ ?>

            <td class="d-none"><?php echo $row_usuario['id'];?></td>
            <td>KM <?php  echo $row_usuario['km_inicio']; ?></td>

            <td>KM <?php echo $row_usuario['km_final'];?></td>
            <td>KM <?php echo $row_usuario['km_gasto'];?></td>
            <td><?php echo $row_usuario['data'];?></td>
            <td><?php echo "<a class=' nav-link text-light font-italic btn btn-danger' 
							href='deletar.php?id=" . $row_usuario['id'] . "'><i class='fas fa-trash-alt'></i></a>"; ?></td>
            

          


            </tr>

            </div>
</div>

           <?php
       
        
        
        } ?>
        </tbody>
        </table>
</div>
</div>

	</body>
<script src="js/calcular.js"></script>
</html>

