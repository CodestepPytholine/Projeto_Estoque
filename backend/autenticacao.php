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
/*
    QUERY, SELECIONANDO TABELA 'USUARIO'.
*/
$login = $_POST['usuario'];
$senha = $_POST['senha'];
$strTable = "usuario";
$SQL = "*";
$where = "where login = '" . $login . "' and senha = '" . $senha . "'";
$objDB->dbSelect($strTable, $SQL, $where);
$numTotal = mysqli_num_rows($objDB->resultado);

if ($numTotal > 0) {
    echo 'pode logar';
} else {
    echo 'Usuário e senha incorretos!';
}
