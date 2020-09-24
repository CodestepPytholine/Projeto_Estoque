<?php 
require_once 'php/session_check.php';
require_once 'php/db.class.php';
require_once 'php/dbconnect.php';
require_once 'menu.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$cookie = base64_decode($_COOKIE['pf']);
switch($cookie){
    case 1:
    case 2:
        $menu = "<div class=\"ui vertical sidebar menu grey inverted\">
        <div class=\"item\">
            <div class=\"header\">Dashboard</div>
            <div class=\"menu\">
                <a class=\"item\" href=\"dashboard.php\">Página Inicial</a>
                <!-- REMOVIDO TEMPORARIAMENTE
                    <a class=\"item\" href=\"estoque_balanco.php\">Balanço</a>
                -->
            </div>
        </div>
        <div class=\"item\">
            <div class=\"header\">Estoque</div>
            <div class=\"menu\">
                <a class=\"item\" href=\"estoque_entrada.php\">Entrada/Saída</a>
                <!-- REMOVIDO TEMPORARIAMENTE
                    <a class=\"item\" href=\"estoque_balanco.php\">Balanço</a>
                -->
            </div>
        </div>
        <div class=\"item\">
            <div class=\"header\">Produtos</div>
            <div class=\"menu\">
                <a class=\"item\" href=\"cadastro_produto.php\">Cadastro</a>
                <a class=\"item\" href=\"produtos.php\">Gerenciamento</a>
            </div>
        </div>
        <div class=\"item\" >
            <div class=\"header\">Usuários</div>
            <div class=\"menu\">
                <a class=\"item\" href=\"cadastro_usuario.php\">Cadastro</a>
                <a class=\"item\" href=\"usuarios.php\">Gerenciamento</a>
            </div>
        </div>
    </div>
    <!-- CONTEUDO DA PÁGINA -->
    <div class=\"pusher\">
        <!-- MENU FIXO -->
        <div class=\"ui container fluid\">
            <div class=\"ui top fixed menu unstackable grey inverted\">
                <a class=\"item mobileMenu\">
                    <i class=\"sidebar icon large\"></i> Menu
                </a>
                <div id=\"displayMobile\" class=\"item header\">
                    <i class=\"dolly flatbed icon large\"></i> Sistema Controle de Estoque
                </div>
                <div class=\"menu right\">
                    <div id=\"displayMobile\" class=\"item header\">
                        <i class=\"user circle icon large\"></i> Olá, Administrador
                    </div>
                    <a href=\"index.php\" class=\"item\">
                        <i class=\"sign-out icon large\"></i> Sair
                    </a>
                </div>
            </div>
        </div>";
        break;
    case 3:
    case 4:
        $menu = "<div class=\"ui vertical sidebar menu grey inverted\">
        <div class=\"item\">
            <div class=\"header\">Dashboard</div>
            <div class=\"menu\">
                <a class=\"item\" href=\"dashboard.php\">Página Inicial</a>
                <!-- REMOVIDO TEMPORARIAMENTE
                    <a class=\"item\" href=\"estoque_balanco.php\">Balanço</a>
                -->
            </div>
        </div>
        <div class=\"item\">
            <div class=\"header\">Estoque</div>
            <div class=\"menu\">
                <a class=\"item\" href=\"estoque_entrada.php\">Entrada/Saída</a>
                <!-- REMOVIDO TEMPORARIAMENTE
                    <a class=\"item\" href=\"estoque_balanco.php\">Balanço</a>
                -->
            </div>
        </div>
        <div class=\"item\">
            <div class=\"header\">Produtos</div>
            <div class=\"menu\">
                <a class=\"item\" href=\"cadastro_produto.php\">Cadastro</a>
                <a class=\"item\" href=\"produtos.php\">Gerenciamento</a>
            </div>
        </div>
    </div>
    <!-- CONTEUDO DA PÁGINA -->
    <div class=\"pusher\">
        <!-- MENU FIXO -->
        <div class=\"ui container fluid\">
            <div class=\"ui top fixed menu unstackable grey inverted\">
                <a class=\"item mobileMenu\">
                    <i class=\"sidebar icon large\"></i> Menu
                </a>
                <div id=\"displayMobile\" class=\"item header\">
                    <i class=\"dolly flatbed icon large\"></i> Sistema Controle de Estoque
                </div>
                <div class=\"menu right\">
                    <div id=\"displayMobile\" class=\"item header\">
                        <i class=\"user circle icon large\"></i> Olá, Administrador
                    </div>
                    <a href=\"index.php\" class=\"item\">
                        <i class=\"sign-out icon large\"></i> Sair
                    </a>
                </div>
            </div>
        </div>";
        break;   
}
echo $menu;
?>
<!-- MENU LATERAL -->