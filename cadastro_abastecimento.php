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
    $strTable = "abastecimento";
    $SQL = "*";
    $where = "LEFT JOIN caminhão on id_caminhão = caminhão_id_caminhão WHERE id_abastecimento = '$id' ";
    $objDB->dbSelect($strTable, $SQL, $where);
    $numTotal = mysqli_num_rows($objDB->resultado);
    if ($numTotal > 0) {
        $select = "";
        $km =  $objDB->mysqli_result($objDB->resultado, 0, "km_abastecimento");
        $qtd = $objDB->mysqli_result($objDB->resultado, 0, "qtd_abastecimento");
        $caminhao =  $objDB->mysqli_result($objDB->resultado, 0, "caminhão_id_caminhão");
    }
    $strTable = "caminhão";
    $SQL = "*";
    $objDB->dbSelectNo($strTable, $SQL);
    $numTotal = mysqli_num_rows($objDB->resultado);
    
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
} else {
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
    <title>Cadastro Abastecimento | Sistema Controle de Estoque - SCE</title>
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
                    <a class="section" href="abastecimento.php">Abastecimento</a>
                    <i class="right arrow icon divider"></i>
                    <a class="section active">Cadastro de Abastecimento</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO -->
    <div class="ui grid container segment">
        <div class="row one column stackable">
            <div class="column">
                <form action="backend/cadastrar_abastecimento.php" method="POST" class="ui form">
                    <h2 class="ui dividing header"><?= (isset($id) && !empty($id)) ? 'Atualização' : 'Cadastro' ?> de Abastecimento</h2>
                    <input type="hidden" name="id" value="<?= (isset($id)) ? $id : '' ?>">
                    <div class="fields">
                        <div class="twelve wide field required">
                            <label>KM de abastecimento</label>
                            <input type="text" name="km" placeholder="178146"  value="<?= (isset($km)) ? $km : '' ?>" onkeypress="$(this).mask('000.000.000 KM', {reverse: true})">
                        </div>
                        <div class="four wide field required">
                            <label>Quantidade abastecida:</label>
                            <input type="text" name="qtd" placeholder="70" value="<?= (isset($qtd)) ? $qtd : '' ?>">
                        </div>
                    </div>
                    <div class="equal width fields">
                        <div class="field required">
                            <label>Caminhao:</label>
                            <select class="ui dropdown" name="caminhao">
                                <option value="" selected></option>
                                <?php echo $select; ?>
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