<?php
    require("conexao.php");
    

    if(isset($_POST["username"]) && isset($_POST["password"]) && $conexao != null){
        $query = $conexao->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
        $query->execute(array($_POST["username"], $_POST["password"]));

        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["adm"]);

            echo "<script>window.location = '../quilometragem.php'</script>";
            
        }else{
            echo "<script>window.location = '../index.php'</script>";
        }
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }
?>