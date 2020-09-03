<?php 

extract($_POST);

include("../php/db.class.php");
include("../php/dbconnect.php"); 

   
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$username = $_POST['username'];
$password = $_POST['password'];
$cargo = $_POST['cargo'];


$strTable = "usuario (nome, login, senha, status_usuario, id_perfil) ";
$strSQL = " ('$nome',
            '$username',
            '$password',
            '1',
            '$cargo') ";

$objDB->dbInsert($strTable, $strSQL);

    if($objDB->resultado == 1){
        $retorno .= "Registro realizado com sucesso!";
    }else{
        $retorno .= " Erro de Cadastro.";
    }

exit("<script> alert('$retorno');   window.location = document.referrer; </script>");
?>