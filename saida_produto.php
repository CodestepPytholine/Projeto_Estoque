<?php
/*
    REQUIRE INICIAIS.
*/
require_once 'php/db.class.php';
require_once 'php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
if (isset($_GET) && !empty($_GET)) {
    $id = base64_decode($_GET['id']);
    $strTable = "produto";
    $SQL = "*";
    $where = "WHERE id_produto = '$id' ";
    $objDB->dbSelect($strTable, $SQL, $where);
    $numTotal = mysqli_num_rows($objDB->resultado);
    if ($numTotal > 0) {
        $nome =  $objDB->mysqli_result($objDB->resultado, 0, "nome_produto");
        $qtd =  $objDB->mysqli_result($objDB->resultado, 0, "qtd_produto");
        $desc =  $objDB->mysqli_result($objDB->resultado, 0, "descricao_produto");
        $tamanho =  $objDB->mysqli_result($objDB->resultado, 0, "tamanho_produto");
        $modelo =  $objDB->mysqli_result($objDB->resultado, 0, "modelo_produto");
        $preco =  $objDB->mysqli_result($objDB->resultado, 0, "preco_produto");
        $marca =  $objDB->mysqli_result($objDB->resultado, 0, "marca_produto");
        $cond =  $objDB->mysqli_result($objDB->resultado, 0, "condicao_produto");
        $cat =  $objDB->mysqli_result($objDB->resultado, 0, "categoria_produto");
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
    <title>Alteração - Saída de Produto | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Alteração - Entrada de Produto | Sistema Controle de Estoque - SCE" />
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
                    <a class="section" href="estoque_entrada.php">Estoque - Entrada/Saída</a>
                    <i class="right arrow icon divider"></i>
                    <a class="section active">Alteração - Saída de Produto</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIO -->
    <div class="ui grid container segment">
        <div class="row one column stackable">
            <div class="column">
                <form action="backend/alterar_quantidade.php" method="POST" class="ui form">
                    <input type="hidden" name="id" value="<?= (isset($id)) ? $id : '' ?>">
                    <input type="hidden" name="funcao" value="2">
                    <h2 class="ui dividing header">Saída de Produto</h2>
                    <div class="fields">
                        <div class="eight wide field required">
                            <label>Nome do produto:</label>
                            <input type="text" value="<?= (isset($nome)) ? $nome : '' ?>" readonly="readonly">
                        </div>
                        <div class="four wide field required">
                            <label>Preço pago:</label>
                            <input type="text" value="<?= (isset($preco)) ? $preco : '' ?>" readonly="readonly" onkeypress="$(this).mask('#.##0,00', {reverse: true})">
                        </div>
                        <div class="four wide field required">
                            <label>Tamanho:</label>
                            <input type="text" value="<?= (isset($tamanho)) ? $tamanho : '' ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="equal width fields">
                        <div class="field required">
                            <label>Marca:</label>
                            <input type="text" value="<?= (isset($marca)) ? $marca : '' ?>" readonly="readonly">
                        </div>
                        <div class="field">
                            <label>Modelo:</label>
                            <input type="text" value="<?= (isset($modelo)) ? $modelo : '' ?>" readonly="readonly">
                        </div>
                        <div class="field">
                            <label>Quantidade em estoque:</label>
                            <input type="text" name="qtd" value="<?= (isset($qtd)) ? $qtd : '' ?>" readonly="readonly" onkeypress="$(this).mask('0#')">
                        </div>
                        <div class="field required">
                            <label>Categoria:</label>
                            <input type="text" value="<?= (isset($cat)) ? $cat : '' ?>" readonly="readonly">
                        </div>
                        <div class="field required">
                            <label>Condição:</label>
                            <select class="ui dropdown" name="condicao" disabled>
                                <option value="1" <?= (isset($cond) && ($cond == '1')) ? 'selected' : '' ?>>Novo</option>
                                <option value="2" <?= (isset($cond) && ($cond == '2')) ? 'selected' : '' ?>>Usado</option>
                            </select>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field required">
                            <label>Quantidade Saída:</label>
                            <input name="valor" type="text" onkeypress="$(this).mask('0#')">
                        </div>
                    </div>
                    <div>
                        <button class="ui animated button grey right floated large" type="submit" tabindex="0">
                            <div class="hidden content">
                                <i class="save icon"></i>
                            </div>
                            <div class="visible content">
                                Salvar
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