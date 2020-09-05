<?php 

extract($_POST);

include("../php/db.class.php");
include("../php/dbconnect.php"); 

$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
$retorno = "";

if (isset($_POST['id']) && !empty($_POST['id'])){
 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $tamanho = $_POST['tamanho'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $qtd = $_POST['qtd'];
    $cat = $_POST['categoria'];
    $cond = $_POST['condicao'];
    $desc = $_POST['desc'];

    $strTable = "produto";
    $strSQL = " nome_produto='$nome',
                qtd_produto='$qtd',
                descricao_produto='$desc',
                tamanho_produto='$tamanho',
                modelo_produto='$modelo',
                preco_produto='$preco',
                marca_produto='$marca',
                condicao_produto='$cond',
                categoria_produto='$cat'";

    $strWhere = "id_produto = '$id' ";
    $objDB->dbUpdate($strTable, $strSQL, $strWhere);

    if($objDB->resultado == 1){
        $retorno .= "Atualização realizada com sucesso!";
    }else{
        $retorno .= " Erro de Atualização.";
    }

} else {
  
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $tamanho = $_POST['tamanho'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $qtd = $_POST['qtd'];
    $cat = $_POST['categoria'];
    $cond = $_POST['condicao'];
    $desc = $_POST['desc'];

    $strTable = "produto (nome_produto, qtd_produto, descricao_produto, status_produto, tamanho_produto, modelo_produto, preco_produto, marca_produto, categoria_produto, condicao_produto) ";
    $strSQL = " ('$nome',
                '$qtd',
                '$desc',
                '1',
                '$tamanho',
                '$modelo',
                '$preco',
                '$marca',
                '$cat',
                '$cond') ";
    
    $objDB->dbInsert($strTable, $strSQL);
        
        if($objDB->resultado == 1){
            $retorno .= "Registro realizado com sucesso!";
        }else{
            $retorno .= " Erro de Cadastro.";
        }
        
}
exit("<script> alert('$retorno');   window.location = document.referrer; </script>");

?>