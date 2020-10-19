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

    $strTable = "manutencao";
    $SQL = "*";
    $where = "LEFT JOIN caminhão on id_caminhão = caminhão_id_caminhão 
            LEFT JOIN tp_manutencao on id_tpManutencao = tp_manutencao_id_tpManutencao";
    $objDB->dbSelectNo($strTable, $SQL, $where);
    $numTotal = mysqli_num_rows($objDB->resultado);
    /*
        VERIFICO SE A QUERY RETORNOU ALGUM RESULTADO.
    */
    if ($numTotal > 0) {
        /*
            INICIO MINHA TABELA COMO VAZIA.
        */
        $table_c = "";
        /*
            LAÇO QUE ORGANIZA O RESULTADO DA QUERY,
            E MOSTRA NA TABELA.
        */
        for ($i = 0; $i < $numTotal; $i++) {
            $km =  $objDB->mysqli_result($objDB->resultado, $i, "km_manutencao");

            if ($km > 10000){
                $table_c .=
                "<div class=\"card\">
                    <div class=\"content\">
                        <div class=\"header\"></div>
                        <div class=\"meta\"></div>
                        <div class=\"description\">
                            <div class=\"ui statistics\">
                                <div class=\"statistic\">
                                    <div class=\"value\">
                                        $km
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
    <!-- Animated CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Style Custom -->
    <link rel="stylesheet" href="assets/css/style_custom_dashboard.css">
    <!-- Dependecias JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/theme/semantic.min.js"></script>
    <!-- Script Custom -->
    <script src="assets/js/script_custom_dashboard.js"></script>
</head>

<body>
    <?php
        include('menu.php');
    ?>
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
    <div class="ui grid container segment stackable">
        <div class="row">
            <div class="five wide column right floated">
                <div class="ui message info animate__animated animate__headShake animate__infinite">
                    <div class="header">
                        Alerta de Caminhões
                    </div>
                    <p>
                        Alguns Caminhões estão Kilometragem limite
                    </p>
                </div>
            </div>
        </div>
        <div class="row one column">
            <div class="column">
                <div class="ui three cards stackable">
                    <?= (isset($table_c)) ? $table_c : '' ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="six wide column right floated">
                <div class="ui message info animate__animated animate__headShake animate__infinite">
                    <div class="header">
                        Alerta de Produtos
                    </div>
                    <p>
                        Alguns produtos encontram-se em baixo estoque
                    </p>
                </div>
            </div>
        </div>
        <div class="row one column">
            <div class="column">
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