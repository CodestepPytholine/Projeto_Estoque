<?php
/*
    REQUIRE INICIAIS.
*/
require_once 'php/db.class.php';
require_once 'php/dbconnect.php';
require_once 'menu.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
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
    <meta name="title" content="Alteração - Saída de Produto | Sistema Controle de Estoque - SCE" />
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
</head>

<body>
    <!-- PAINEL DE NAVEGAÇÃO EM TRILHA -->
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
                <div class="ui breadcrumb big">
                    <a class="section" href="dashboard.php">Dashboard</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section" href="estoque_saida.php">Estoque - Saída</a>
                    <i class="right arrow icon divider"></i>
                    <a class="section active">Alteração - Saída de Produto</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FORMULARIOS -->
    <div class="ui grid container segment">
        <div class="row one column stackable">
            <div class="column">
                <form action="" method="POST" class="ui form">
                    <h2 class="ui dividing header">Saída de Produto</h2>
                    <div class="fields">
                        <div class="eight wide field required">
                            <label>Nome do produto:</label>
                            <input type="text" value="Oléo lubrificante" disabled>
                        </div>
                        <div class="four wide field required">
                            <label>Preço pago:</label>
                            <input type="text" value="15,00" disabled>
                        </div>
                        <div class="four wide field required">
                            <label>Tamanho:</label>
                            <input type="text" value="Médio" disabled>
                        </div>
                    </div>
                    <div class="equal width fields">
                        <div class="field required">
                            <label>Marca:</label>
                            <input type="text" value="WD" disabled>
                        </div>
                        <div class="field required">
                            <label>Modelo:</label>
                            <input type="text" value="WD-40" disabled>
                        </div>
                        <div class="field required">
                            <label>Quantidade em estoque:</label>
                            <input type="text" value="10" disabled>
                        </div>
                        <div class="field required">
                            <label>Categoria:</label>
                            <input type="text" value="Freio" disabled>
                        </div>
                        <div class="field required">
                            <label>Condição:</label>
                            <select name="" id="" disabled>
                                <option value="novo">Novo</option>
                                <option value="usado" selected>Usado</option>
                            </select>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field required">
                            <label>Quantidade saída:</label>
                            <input type="text">
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