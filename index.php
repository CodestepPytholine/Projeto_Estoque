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
        <form class="ui large form" action="dashboard.php">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="usuario" placeholder="Usuario">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                </div>
                <div class="ui fluid large submit button grey">Entrar</div>
            </div>
            <div class="ui error message"></div>
        </form>
        <div class="ui message">
            Esqueceu a senha? <a href="#">Recuperar senha</a>
        </div>
    </div>
</div>
</body>

</html>