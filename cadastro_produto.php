<?php 
include("php/db.class.php");
include("php/dbconnect.php");

$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
    if(isset($_POST) && !empty($_POST)){
        $id = base64_decode($_POST['id']); 
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
            $cat =  $objDB->mysqli_result($objDB->resultado, 0, "categoria_produto");;	
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
    <title>Cadastro Produto | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Cadastro Produto | Sistema Controle de Estoque - SCE" />
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
                        <a class="section" href="produtos.php">Produtos</a>
                        <i class="right arrow icon divider"></i>
                        <a class="section active">Cadastro Produto</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Funcionalidades/Funções -->
        <div class="ui grid container segment">
            <div class="row one column stackable">
                <div class="column">
                    <form action="backend/cadastrar_produto.php" method="POST" class="ui form">
                        <h2 class="ui dividing header"><?=(isset($id) && !empty($id))?'Atualização':'Cadastro'?> de Produto</h2>
                        <input type="hidden" name="id" value="<?=(isset($id))?$id:''?>">
                        <div class="fields">
                            <div class="six wide field required">
                                <label>Nome do produto:</label>
                                <input type="text" name="nome" placeholder="Cabeçote Dianteiro" value="<?=(isset($nome))?$nome:''?>">
                            </div>
                            <div class="four wide field required">
                                <label>Preço pago:</label>
                                <input type="text" name="preco" placeholder="2.397,48" value="<?=(isset($preco))?$preco:''?>">
                            </div>
                            <div class="four wide field required">
                                <label>Tamanho:</label>
                                <input type="text" name="tamanho" placeholder="10x15x20" value="<?=(isset($tamanho))?$tamanho:''?>">
                            </div>
                            <div class="two wide field required">
                                <div class="ui toggle checkbox">
                                    <label>Status:</label>
                                    <input type="checkbox" name="status">
                                </div>
                            </div>
                        </div>
                        <div class="equal width fields">
                            <div class="field required">
                                <label>Marca:</label>
                                <input type="text" name="marca" placeholder="Hyunday" value="<?=(isset($marca))?$marca:''?>">
                            </div>
                            <div class="field required">
                                <label>Modelo:</label>
                                <input type="text" name="modelo" placeholder="Lanternagem" value="<?=(isset($modelo))?$modelo:''?>">
                            </div>
                            <div class="field required">
                                <label>Quantidade em estoque:</label>
                                <input type="text" name="qtd" placeholder="10" value="<?=(isset($qtd))?$qtd:''?>">
                            </div>
                            <div class="field required">
                                <label>Categoria:</label>
                                <input type="text" name="categoria" placeholder="Ex.: Freio" value="<?=(isset($cat))?$cat:''?>">
                            </div>
                            <div class="field required">
                                <label>Condição:</label>
                                <select class="ui search dropdown" name="condicao">
                                    <option value="" <?=(isset($cond) == '')?'selected':''?>></option>
                                    <option value="1" <?=(isset($cond) == '1')?'selected':''?>>Novo</option>
                                    <option value="2" <?=(isset($cond) == '2')?'selected':''?>>Usado</option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <div class="sixteen wide field">
                                <label for="textarea">Descrição</label>
                                <textarea name="desc" id="textearea" rows="2"><?=(isset($desc))?$desc:''?></textarea>
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