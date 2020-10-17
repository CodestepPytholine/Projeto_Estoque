<?php
/*
    REQUIRE INICIAIS.
*/
require_once 'php/session_check.php';
require_once 'php/db.class.php';
require_once 'php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/

$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);

if (isset($_POST) && !empty($_POST)) {
    $id = base64_decode($_POST['id']);
//Select Manutenção
    $strTable = "manutencao";
    $SQL = "*";
    $where = "LEFT JOIN caminhão on id_caminhão = caminhão_id_caminhão 
            LEFT JOIN tp_manutencao on id_tpManutencao = tp_manutencao_id_tpManutencao
            WHERE id_manutencao = '$id' ";
    $objDB->dbSelect($strTable, $SQL, $where);
    $numTotal = mysqli_num_rows($objDB->resultado);
    if ($numTotal > 0) {
        $select = "";
        $km =  $objDB->mysqli_result($objDB->resultado, 0, "km_manutencao");
        $caminhao =  $objDB->mysqli_result($objDB->resultado, 0, "caminhão_id_caminhão");
        $manutencao = $objDB->mysqli_result($objDB->resultado, 0, "tp_manutencao_id_tpManutencao");
    }
//************************************************* */
//Select Caminhão

    $strTable = "caminhão";
    $SQL = "*";
    $objDB->dbSelectNo($strTable, $SQL);
    $numTotal = mysqli_num_rows($objDB->resultado);
    if ($numTotal > 0) {
        $select = "";

        for($i = 0; $i < $numTotal; $i++ ){
            $id_caminhao = $objDB->mysqli_result($objDB->resultado, $i, "id_caminhão");
            $name =  $objDB->mysqli_result($objDB->resultado, $i, "nome_motorista");
            $placa = $objDB->mysqli_result($objDB->resultado, $i, "placa_caminhao");
            if($caminhao == $id_caminhao){
                $select .= "<option value=\"$id_caminhao\" selected>$placa - $name</option>";
            } else {
                $select .= "<option value=\"$id_caminhao\" >$placa - $name</option>";
            }
            
        }
    }
//************************************************* */
//Select Tipo de Manutenção  
    $strTable = "tp_manutencao";
    $SQL = "*";
    $objDB->dbSelectNo($strTable, $SQL);
    $numTotal = mysqli_num_rows($objDB->resultado);

    if ($numTotal > 0) {

        $selectServico = "";
        for($i = 0; $i < $numTotal; $i++ ){

            $id_manutencao = $objDB->mysqli_result($objDB->resultado, $i, "id_tpManutencao");
            $tp = $objDB->mysqli_result($objDB->resultado, $i, "tp_manutencao");
            if($id_manutencao == $manutencao){
                $selectServico .= "<option value=\"$id_manutencao\" selected>$tp</option>";
            } else {
                $selectServico .= "<option value=\"$id_manutencao\" >$tp</option>";
            }

        }
    }
     //************************************************* */
} else {
//Select Caminhão
    $strTable = "caminhão";
    $SQL = "*";
    $objDB->dbSelectNo($strTable, $SQL);
    $numTotal = mysqli_num_rows($objDB->resultado);

    if ($numTotal > 0) {
        $select = "";

        for($i = 0; $i < $numTotal; $i++ ){
            $id_caminhao = $objDB->mysqli_result($objDB->resultado, $i, "id_caminhão");
            $name =  $objDB->mysqli_result($objDB->resultado, $i, "nome_motorista");
            $placa = $objDB->mysqli_result($objDB->resultado, $i, "placa_caminhao");
            $modelo =  $objDB->mysqli_result($objDB->resultado, $i, "modelo_caminhao");
            $ano = $objDB->mysqli_result($objDB->resultado, $i, "ano_caminhao");

            $select .= "<option value=\"$id_caminhao\" >$placa - $name</option>";

        }
    }
//************************************************* */
//Select Tipo de Manutenção  
    $strTable = "tp_manutencao";
    $SQL = "*";
    $objDB->dbSelectNo($strTable, $SQL);
    $numTotal = mysqli_num_rows($objDB->resultado);

    if ($numTotal > 0) {
        $selectServico = "";

        for($i = 0; $i < $numTotal; $i++ ){

            $id_manutencao = $objDB->mysqli_result($objDB->resultado, $i, "id_tpManutencao");
            $tp = $objDB->mysqli_result($objDB->resultado, $i, "tp_manutencao");

            $selectServico .= "<option value=\"$id_manutencao\" >$tp</option>";
        }
    }

//************************************************* */
}

 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metas Padrões -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="language" content="pt-br" />
    <!-- Metas Descritivos -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="company" content="">
    <meta name="author" content="Phytoline & Gabriel_PRM" />
    <!-- Titulo & Favicon -->
    <title>Cadastro Manutenção | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Cadastro Usuário | Sistema Controle de Estoque - SCE" />
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <!-- Framework Semantic UI -->
    <link rel="stylesheet" href="assets/theme/semantic.min.css">
    <!-- Style Custom -->
    <link rel="stylesheet" href="assets/css/style_custom_dashboard.css">
    <!-- Dependecias JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/theme/semantic.min.js"></script>
    <!-- Script Custom -->
    <script src="assets/js/script_custom_dashboard.js"></script>
    <!-- Script JQuery Mask -->
    <script src="assets/plugins/JQuery Mask/jquery.mask.min.js"></script>
    <?php 
    include('menu.php'); 
    ?>
</head>

<body>
    <!-- PAINEL DE NAVEGAÇÃO EM TRILHA -->
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
                <div class="ui breadcrumb">
                    <a class="section" href="dashboard.php">Página Inicial</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section" href="manutencao.php">Manutenção</a>
                    <i class="right arrow icon divider"></i>
                    <a class="section active">Cadastro de Manutenção</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO -->
    <div class="ui grid container segment">
        <div class="row one column stackable">
            <div class="column">
                <form action="backend/cadastrar_manutencao.php" method="POST" class="ui form">
                    <h2 class="ui dividing header"><?= (isset($id) && !empty($id)) ? 'Atualização' : 'Cadastro' ?> de Manutenção</h2>
                    <input type="hidden" name="id" value="<?= (isset($id)) ? $id : '' ?>">
                    <div class="fields">
                        <div class="six wide field required">
                            <label>KM de manutenção</label>
                            <input type="text" name="km" placeholder="178146"  value="<?= (isset($km)) ? $km : '' ?>" onkeypress="$(this).mask('000.000.000 KM', {reverse: true})">
                        </div>
                        <div class="ten wide field required">
                            <label>Caminhao:</label>
                            <select class="ui dropdown" name="caminhao">
                                <option value="" selected></option>
                                <?= (isset($select)) ? $select : '' ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="equal width fields">
                        <div class="field required">
                            <label>Tipo de Manutenção:</label>
                            <select class="ui dropdown" name="tipo">
                                <option value="" selected></option>
                                <?= (isset($selectServico)) ? $selectServico : '' ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button class="ui animated button grey right floated large" type="submit" tabindex="0">
                            <div class="hidden content">
                                <i class="save icon"></i>
                            </div>
                            <div class="visible content">
                                <?= (isset($id) && !empty($id)) ? 'Salvar' : 'Cadastrar' ?>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DIV QUE FECHA O TEMPLATE 'MENU' -->
    </div>
</body>

</html>