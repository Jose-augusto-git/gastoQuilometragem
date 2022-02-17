<?php
// Inclui a conexão

include_once("private/connection/conexao.php");



/*
// Nome do Arquivo do Excel que será gerado
$arquivo = 'dados.xlsx';

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
$tabela .= '</tr>';*/
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Writer\Xls;

// criação da planilha

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

// edição do titulo da planilha

$sheet->setTitle("teste");

// realização do query para requerimento dos dados

                  

                       $query = "SELECT * FROM quilometro";

                       

                  

// consulta

$sql = $conn->query($query);

$i = 1;

/*//Puxando dados do Banco de dados
$result_usuario = "SELECT * FROM  quilometro";
$resultado_usuario = mysqli_query($conn, $result_usuario);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){ 

           

            $tabela .= '<tr>';
            $tabela .= '<td>'.$row_usuario[''].'</td>';
            $tabela .= '<td>'.$row_usuario[''].'</td>';
            $tabela .= '<td>'.$row_usuario[''].'</td>';
            $tabela .= '<td>'.$row_usuario[''].'</td>';

            $tabela .= '</tr>';


 } 
 
 
 $tabela .= '</table>';*/
 // inserindo as informações na planilha , conforme cada celula indicada.

 while($exibe = $sql->fetch(PDO::FETCH_ASSOC)){

    

    $sheet->setCellValue('B'.$i, $exibe['km_inicio']);

    $sheet->setCellValue('C'.$i, $exibe['km_final']);

    $sheet->setCellValue('D'.$i, $exibe['data']);

    $sheet->setCellValue('E'.$i, $exibe['km_gasto']);


    $i++;

    }


// Força o Download do Arquivo Gerado
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="teste.xlsx"');

header('Cache-Control: max-age=0');

header('Cache-Control: max-age=1');

header('Cache-Control: cache, must-revalidate');

header('Pragma: public');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

$writer->save('php://output');

 

 

$conn = null;

?>


