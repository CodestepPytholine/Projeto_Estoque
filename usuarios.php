<?php 
include("php/db.class.php");
include("php/dbconnect.php");

    $objDB = new db();
    $objDB->dbConnect($strServer, $strUser, $strPass, $strDB);

    $strTable = "usuario";
    $SQL = "*";
    $where = " LEFT JOIN perfil on perfil.id_perfil = usuario.id_perfil";
	$objDB->dbSelect($strTable, $SQL, $where);
	$numTotal = mysqli_num_rows($objDB->resultado);
	if ($numTotal > 0) {
        $table = "";
		for ($i = 0; $i < $numTotal; $i++) {
            $id = $objDB->mysqli_result($objDB->resultado, $i, "id_usuario");
			$nome =  $objDB->mysqli_result($objDB->resultado, $i, "nome");
			$username =  $objDB->mysqli_result($objDB->resultado, $i, "login");
            $cargo =  $objDB->mysqli_result($objDB->resultado, $i, "nome_perfil");	
            $hdID = base64_encode($id);
            
            $table .= " <tr>
                            <td>$nome</td>
                            <td>$username</td>
                            <td>$cargo</td>
                            <td class=\"center aligned\">
                                <div class=\"ui buttons\">
                                    <form action=\"cadastro_usuario.php\" method=\"POST\" id=\"editUser\">
                                        <input type=\"hidden\" name=\"id\" value=\"$hdID\">
                                        <button class=\"ui button yellow submit\">Editar</button>
                                    </form>                                    
                                    <div class=\"or\" data-text=\"OU\"></div>
                                    <a class=\"ui button negative\" href=\"cadastro_usuario.php\">Deletar</a>
                                </div>
                            </td>
                        </tr>";			
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
    <title>Usuários | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Usuários | Sistema Controle de Estoque - SCE" />
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
    <!--Scripts DataTable-->
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/dataTables.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/responsive.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/Buttons-1.6.2/js/buttons.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="scripts/script.js"></script>
    <!--Styles DataTable-->
    <link rel="stylesheet" href="assets/plugins/DataTables/DataTables-1.10.21/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/Responsive-2.2.5/css/responsive.semanticui.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/Buttons-1.6.2/css/buttons.semanticui.min.css">
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
                        <i class="right arrow icon divider"></i>
                        <a class="section active">Usuários</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Funcionalidades/Funções -->
        <div class="ui grid container segment">
            <div class="row one column">
                <div class="column">
                    <table class="ui striped celled table display responsive nowrap unstackable grey-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>NOME</th>
                                <th>USUÁRIO</th>
                                <th>CARGO</th>
                                <th>AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>  
                           <?php 
                            echo $table;
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>