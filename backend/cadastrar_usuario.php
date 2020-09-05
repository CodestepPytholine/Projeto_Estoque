<?php

extract($_POST);
/*
    INCLUDES INICIAIS.
*/
include("php/db.class.php");
include("php/dbconnect.php");
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
$retorno = "";
if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];

    $strTable = "usuario";
    $strSQL = "
            nome='$nome',
            login='$username',
            senha='$password',
            id_perfil='$cargo',
            cpf_usuario='$cpf'";

    $strWhere = "id_usuario = '$id' ";
    $objDB->dbUpdate($strTable, $strSQL, $strWhere);

    if ($objDB->resultado == 1) {
        $retorno .= "Atualização realizada com sucesso!";
    } else {
        $retorno .= " Erro de Atualização.";
    }
} else {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];


    $strTable = "usuario (nome, login, senha, status_usuario, id_perfil, cpf_usuario) ";
    $strSQL = " ('$nome',
                    '$username',
                    '$password',
                    '1',
                    '$cargo',
                    '$cpf') ";

    $objDB->dbInsert($strTable, $strSQL);

    if ($objDB->resultado == 1) {
        $retorno .= "Registro realizado com sucesso!";
    } else {
        $retorno .= " Erro de Cadastro.";
    }
}
exit("<script> alert('$retorno');   window.location = document.referrer; </script>");
