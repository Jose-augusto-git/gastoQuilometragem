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

<body id="busca">
	<!-- Vertical navbar -->
	
	<!-- End vertical navbar -->

	<script src="js/telaPrincipal.js"></script>
	<div class="page-content p-5" id="content">
		<header class="text-center page-header">
			<div class="header-content">

				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>

		</header>
		<!-- Toggle button -->
		
   
		<!-- Demo content -->
		<h2 class="display-4 text-white text-center">Sistema</h2>
		<div class="separator"></div>
		<div class="row text-white ">
        <form class="pb-5" id="busca-cliente" method="POST" action="">
		
		<div class="separator"></div>
			<nav class=" navbar navbar-light bg-light">
			
			<div class="input-group px-3">

            <input class="form-control" id="subject" type="date" name="datainicio" >
            <input class="form-control" id="subject" type="date" name="datafim" >


				<div class="input-group-append">
				<button name="SendPesqUser" type="submit" value="Pesquisar" class="btn btn-outline-secondary">Pesquisar</button>
					
				</div>
			
			</div>

			</nav>
			</form>
            <?php
                            

                            $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
                            if($SendPesqUser){
                                $datainico = $_POST['datainicio'];
                                $datafim = $_POST['datafim'];
                                $quilometro = filter_input(INPUT_POST, 'quilometro', FILTER_SANITIZE_STRING);
                                $result_usuario = "SELECT * FROM quilometro WHERE data BETWEEN '$datainico' AND '$datafim' ORDER BY data";
                                
                                $resultado_usuario = mysqli_query($conn, $result_usuario);
                                while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

                                    echo '<h1 class="d-none"> ID:<br>' . $row_usuario['id'] . "</h1>";

                                    echo '<div class="row text-white">';
                                    /*echo '<div class="col-lg-7">'; */
                                    echo '<h3 class="text-dark"> Medicamento<br></h3> <p class="lead">' . $row_usuario['km_inicio'] . "</p> <br><hr>";
                
                                    echo '<h3 class="text-dark"> Abreviação<br></h3> <p class="lead">' . $row_usuario['km_final'] . "</p> <br><hr>";
                
                                    echo '<h3 class="text-dark"> Latim<br></h3> <p class="lead">' . $row_usuario['km_gasto'] . "</p><br><hr>";
                
                                    echo '<h3 class="text-dark"> Fonte</h3> <p class="lead">' . $row_usuario['data'] . '</p><br><hr>';
                
                                   
                                }
                            }

                            ?>

                            </div>
                        </div>
                    
                        </div>
                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                    
                        <!-- Botão para acionar modal -->
                    
                    </body>