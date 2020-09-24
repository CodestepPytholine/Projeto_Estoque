<?php

extract($_POST);
/*
    REQUIRE INICIAIS.
*/
require_once '../php/db.class.php';
require_once '../php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
$retorno = "";

if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];
    $qtd = $_POST['qtd'];
    $funcao = $_POST['funcao'];
    $valor = $_POST['valor'];
    $hdID = base64_encode($id); 

    if($funcao == '1'){
        $qtd += $valor;
    }else if($funcao == '2'){
        if($valor > $qtd){
            $retorno .= "Quantidade inserida maior que quantidade em estoque.";
            exit("<script> alert('$retorno'); window.location.href = '../saida_produto.php?id=$hdID';   </script>");
        } else{
            $qtd -= $valor;
        }    
    }
        $strTable = "produto";
        $strSQL = "qtd_produto='$qtd'";
        $strWhere = "id_produto = '$id'";
        $objDB->dbUpdate($strTable, $strSQL, $strWhere);
    
        if ($objDB->resultado == 1) {
            $retorno .= "Atualização realizada com sucesso!";
        } else {
            $retorno .= " Erro de Atualização.";
        }
    

    
} else {
    $retorno .= " Erro de Cadastro.";
}
exit("<script> alert('$retorno'); window.location.href = '../estoque_entrada.php';  </script>");
