<?php
// Inclui a conexão

include_once("private/connection/conexao.php");

// Nome do Arquivo do Excel que será gerado
$arquivo = 'dados_emails.xls';

// Criamos uma tabela HTML com o formato da planilha para excel
$tabela = '<table border="1">';
$tabela .= '<tr>';
$tabela .= '<td colspan="4">CONTROLE DE QUILOMETRAGEM</tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>KM/INICIAL</b></td>';
$tabela .= '<td><b>KM/FINAL</b></td>';
$tabela .= '<td><b>DATA</b></td>';
$tabela .= '<td><b>KM/GASTO</b></td>';
$tabela .= '</tr>';

//Puxando dados do Banco de dados
$result_usuario = "SELECT * FROM  quilometro";
$resultado_usuario = mysqli_query($conn, $result_usuario);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){ 

           

            $tabela .= '<tr>';
            $tabela .= '<td>'.$row_usuario['km_inicio'].'</td>';
            $tabela .= '<td>'.$row_usuario['km_final'].'</td>';
            $tabela .= '<td>'.$row_usuario['data'].'</td>';
            $tabela .= '<td>'.$row_usuario['km_gasto'].'</td>';

            $tabela .= '</tr>';


 } 
 
 
 $tabela .= '</table>';

// Força o Download do Arquivo Gerado
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
echo $tabela;
 
 
 
 ?>
