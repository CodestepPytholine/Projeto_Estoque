<?php

extract($_POST);
/*
    REQUIRE INICIAIS.
*/
require_once '../php/session_check.php';
require_once '../php/db.class.php';
require_once '../php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
$retorno = "";
if (isset($_POST['id']) && !empty($_POST['id'])) {

   extract($_POST);

    $strTable = "abastecimento";
    $strSQL = "
            km_abastecimento='$km',
            qtd_abastecimento='$qtd',
            caminhão_id_caminhão='$caminhao'";
            

    $strWhere = "id_abastecimento = '$id' ";
    $objDB->dbUpdate($strTable, $strSQL, $strWhere);

    if ($objDB->resultado == 1) {
        $retorno .= "Atualização realizada com sucesso!";
    } else {
        $retorno .= " Erro de Atualização.";
    }
} else {
    extract($_POST);


    $strTable = "abastecimento (km_abastecimento, qtd_abastecimento, caminhão_id_caminhão) ";
    $strSQL = " ('$km',
                    '$qtd',
                    '$caminhao') ";

    $objDB->dbInsert($strTable, $strSQL);

    if ($objDB->resultado == 1) {
        $retorno .= "Registro realizado com sucesso!";
    } else {
        $retorno .= " Erro de Cadastro.";
    }
}
exit("<script> alert('$retorno');   window.location = window.location.href='../abastecimento.php'; </script>");
