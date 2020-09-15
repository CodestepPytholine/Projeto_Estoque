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
    <title>Dashboard | Sistema Controle de Estoque - SCE</title>
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
</head>

<body>
    <!-- PAINEL DE NAVEGAÇÃO EM TRILHA -->
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
                <div class="ui breadcrumb">
                    <a class="section active" href="dashboard.php">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FUNCÕES -->
    <div class="ui grid container segment disabled">
        <div class="row one column">
            <div class="column">
                <div class="ui three cards stackable">
                    <div class="card">
                        <div class="content">
                            <div class="header">Titulo</div>
                            <div class="meta">Metadado</div>
                            <div class="description">
                                <div class="ui placeholder">
                                    <div class="paragraph">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="content">
                            <div class="header">Titulo</div>
                            <div class="meta">Metadado</div>
                            <div class="description">
                                <div class="ui placeholder">
                                    <div class="paragraph">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="content">
                            <div class="header">Titulo</div>
                            <div class="meta">Metadado</div>
                            <div class="description">
                                <div class="ui placeholder">
                                    <div class="paragraph">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid container segment disabled">
        <div class="row one column">
            <div class="column">
                <div class="ui steps fluid">
                    <div class="step">
                        <i class="truck icon"></i>
                        <div class="content">
                            <div class="title">Shipping</div>
                            <div class="description">Choose your shipping options</div>
                        </div>
                    </div>
                    <div class="active step">
                        <i class="payment icon"></i>
                        <div class="content">
                            <div class="title">Billing</div>
                            <div class="description">Enter billing information</div>
                        </div>
                    </div>
                    <div class="disabled step">
                        <i class="info icon"></i>
                        <div class="content">
                            <div class="title">Confirm Order</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid container segment disabled">
        <div class="row one column">
            <div class="column">
                <div class="ui feed">
                    <div class="event">
                        <div class="label">
                            <img src="https://via.placeholder.com/75">
                        </div>
                        <div class="content">
                            <div class="date">
                                3 days ago
                            </div>
                            <div class="summary">
                                <a>Helen Troy</a> added 2 photos
                            </div>
                            <div class="extra images">
                                <a><img src="https://via.placeholder.com/100"></a>
                                <a><img src="https://via.placeholder.com/100"></a>
                            </div>
                        </div>
                    </div>
                    <div class="event">
                        <div class="label">
                            <img src="https://via.placeholder.com/75">
                        </div>
                        <div class="content">
                            <div class="date">
                                3 days ago
                            </div>
                            <div class="summary">
                                <a>Laura Faucet</a> created a post
                            </div>
                            <div class="extra text">
                                Have you seen what's going on in Israel? Can you believe it.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid container segment disabled">
        <div class="row one column">
            <div class="column">
                <div class="ui statistics">
                    <div class="statistic">
                        <div class="value">
                            22
                        </div>
                        <div class="label">
                            Saves
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="text value">
                            Three<br>
                            Thousand
                        </div>
                        <div class="label">
                            Signups
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value">
                            <i class="plane icon"></i> 5
                        </div>
                        <div class="label">
                            Flights
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value">
                            <img src="https://via.placeholder.com/50" class="ui circular inline image">
                            42
                        </div>
                        <div class="label">
                            Team Members
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DIV QUE FECHA O TEMPLATE 'MENU' -->
    </div>
</body>

</html>