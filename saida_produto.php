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
    <!-- Menu Lateral -->
    <div class="ui vertical sidebar menu grey inverted">
        <div class="item">
            <div class="header">Estoque</div>
            <div class="menu">
                <a class="item" href="estoque_entrada.php">Entrada</a>
                <a class="item" href="estoque_saida.php">Saída</a>
                <a class="item" href="estoque_balanco.php">Balanço</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Produtos</div>
            <div class="menu">
                <a class="item" href="cadastro_produto.php">Cadastro</a>
                <a class="item" href="produtos.php">Gerenciamento</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Usuários</div>
            <div class="menu">
                <a class="item" href="cadastro_usuario.php">Cadastro</a>
                <a class="item" href="usuarios.php">Gerenciamento</a>
            </div>
        </div>
    </div>
    <!-- Conteudo da Página -->
    <div class="pusher">
        <!-- Menu Fixo -->
        <div class="ui container fluid">
            <div class="ui top fixed menu stackable grey inverted">
                <a class="item mobileMenu">
                    <i class="sidebar icon large"></i> Menu
                </a>
                <div class="item header">
                    <i class="dolly flatbed icon large"></i> Sistema Controle de Estoque
                </div>
                <div class="menu right">
                    <div class="item header">
                        <i class="user circle icon large"></i> Olá, Administrador
                    </div>
                    <a href="index.php" class="item">
                        <i class="sign-out icon large"></i> Sair
                    </a>
                </div>
            </div>
        </div>
        <!-- Painel de Navegação de Trilha -->
        <div class="ui grid container segment">
            <div class="row one column">
                <div class="column">
                    <div class="ui breadcrumb big">
                        <a class="section" href="dashboard.php">Sistema Controle de Estoque - SCE</a>
                        <i class="right chevron icon divider"></i>
                        <a class="section" href="estoque_balanco.php">Estoque - Balanço</a>
                        <i class="right chevron icon divider"></i>
                        <a class="section" href="estoque_saida.php">Estoque - Saída</a>
                        <i class="right arrow icon divider"></i>
                        <a class="section active">Alteração - Saída de Produto</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Funcionalidades/Funções -->
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
    </div>
</body>

</html>