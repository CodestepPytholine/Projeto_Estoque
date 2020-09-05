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
            <div class="ui top fixed menu grey inverted">
                <a class="item mobileMenu">
                    <i class="sidebar icon large"></i> Menu
                </a>
                <div id="displayMobile" class="item header" id="display">
                    <i class="dolly flatbed icon large"></i> Sistema Controle de Estoque
                </div>
                <div class="menu right">
                    <div id="displayMobile" class="item header" id="display">
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
                        <i class="right arrow icon divider"></i>
                        <a class="section active">Produtos</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Funcionalidades/Funções -->