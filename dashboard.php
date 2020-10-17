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

    $strTable = "produto";
    $SQL = "*";

    $objDB->dbSelectNo($strTable, $SQL);
    $numTotal = mysqli_num_rows($objDB->resultado);
    if ($numTotal > 0){
        
       
    

    $table = "";
    /*
        LAÇO QUE ORGANIZA O RESULTADO DA QUERY,
        E MOSTRA NA TABELA.
    */
        for ($i = 0; $i < $numTotal; $i++) {
            $name =  $objDB->mysqli_result($objDB->resultado, $i, "nome_produto");
            $qtd =  $objDB->mysqli_result($objDB->resultado, $i, "qtd_produto");
            $modelo =  $objDB->mysqli_result($objDB->resultado, $i, "modelo_produto");
            $cat =  $objDB->mysqli_result($objDB->resultado, $i, "categoria_produto");
            $qtdMin =  $objDB->mysqli_result($objDB->resultado, $i, "quantidade_minima");
            if($qtd <= $qtdMin){
                $table .=
                "<div class=\"card\">
                    <div class=\"content\">
                        <div class=\"header\">$name</div>
                        <div class=\"meta\">$cat</div>
                        <div class=\"description\">
                            <div class=\"ui statistics\">
                                <div class=\"statistic\">
                                    <div class=\"value\">
                                        $qtd
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
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
    <title>Página Inicial | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Dashboard | Sistema Controle de Estoque - SCE" />
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
                    <a class="section active" href="dashboard.php">Página Inicial</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FUNCÕES -->
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
            <div class="ui message">
                <div class="header">
                    Alerta Caminhões
                </div>
            </div>
                <div class="ui three cards stackable">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
            <div class="ui message">
                <div class="header">
                    Alerta Produtos
                </div>
            </div>
                <div class="ui three cards stackable">
                    <?= (isset($table)) ? $table : '' ?>
                </div>
            </div>
        </div>
    </div>

    
    <!-- DIV QUE FECHA O TEMPLATE 'MENU' -->
    </div>
</body>

</html>