
<?php
/*
    REQUIRE INICIAIS.
*/
require_once 'php/db.class.php';
require_once 'php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$display = "";
$message = "";

if (!empty($_POST['login']) && !empty($_POST['senha']) && isset($_POST['login']) && isset($_POST['login'])) {
    $login = $_POST['login'];
    $senha =  $_POST['senha'];
    $objDB = new db();
    $objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
    $tab = "usuario";
    $campos = "*";
    $condicao = "WHERE login = '$login' AND senha = '$senha'";
    $objDB->dbSelect($tab, $campos, $condicao);
    $numTotal = mysqli_num_rows($objDB->resultado);
    $perfil =  base64_encode($objDB->mysqli_result($objDB->resultado, 0, "id_perfil"));

    if ($numTotal > 0) {
        setcookie('pf',$perfil, (time() + (5 * 24 * 3600)));
        header('Location: dashboard.php');
    } else {
        $display = "style=\"display: block !important;\"" ;
        $message = "Usuário ou Senha incorretos.";
    }   
}
?>
<!DOCTYPE html>
<html>

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
    <title>Área Restrita | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Área Restrita | Sistema Controle de Estoque - SCE" />
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <!-- Framework Semantic UI -->
    <link rel="stylesheet" href="assets/theme/semantic.min.css">
    <!-- Style Custom -->
    <link rel="stylesheet" href="assets/css/style_custom_login.css">
    <!-- Dependecias JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/theme/semantic.min.js"></script>
    <!-- Script Custom -->
    <script src="assets/js/script_custom_login.js"></script>
</head>

<body>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui header">
                <div class="content">
                    Área Restrita | Sistema Controle de Estoque - SCE
                </div>
            </h2>
            <form class="ui large form" action="index.php" method="POST">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="login" placeholder="Login">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="senha" placeholder="Senha">
                        </div>
                    </div>
                    <div class="ui fluid large submit button grey">Entrar</div>
                </div>
                <div class="ui error message" <?php echo $display; ?> > <?php echo $message; ?> </div>
            </form>
            <div class="ui message">
                Esqueceu a senha? <a href="#">Recuperar senha</a>
            </div>
        </div>
    </div>
</body>

</html>