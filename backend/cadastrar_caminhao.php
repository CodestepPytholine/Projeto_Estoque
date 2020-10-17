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
$cookie = base64_decode($_COOKIE['pf']);
switch($cookie){
    case 1:
    case 2:
        break;
    case 3:
    case 4: 
        exit("<script> alert('Permissão Negada.'); window.location.href = 'dashboard.php'; </script>");
        break;   
}
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
$retorno = "";
if (isset($_POST['id']) && !empty($_POST['id'])) {

   extract($_POST);

    $strTable = "caminhão";
    $strSQL = "
            nome_motorista='$nome',
            placa_caminhao='$placa',
            modelo_caminhao='$modelo',
            ano_caminhao='$ano'";
            

    $strWhere = "id_caminhão = '$id' ";
    $objDB->dbUpdate($strTable, $strSQL, $strWhere);

    if ($objDB->resultado == 1) {
        $retorno .= "Atualização realizada com sucesso!";
    } else {
        $retorno .= " Erro de Atualização.";
    }
} else {
    extract($_POST);


    $strTable = "caminhão (nome_motorista, placa_caminhao, modelo_caminhao, ano_caminhao) ";
    $strSQL = " ('$nome',
                    '$placa',
                    '$modelo',
                    '$ano') ";

    $objDB->dbInsert($strTable, $strSQL);

    if ($objDB->resultado == 1) {
        $retorno .= "Registro realizado com sucesso!";
    } else {
        $retorno .= " Erro de Cadastro.";
    }
}
exit("<script> alert('$retorno');   window.location = window.location.href='../caminhoes.php'; </script>");
