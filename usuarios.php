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
$cookie = base64_decode($_COOKIE['pf']);
switch($cookie){
    case 1:
    case 2:
        break;
    case 3:
    case 4: 
        exit("<script> alert('Permissão Negada.'); window.location.href = 'dashboard.php'; </script>");
        break;   
}
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
/*
    QUERY, SELECIONANDO TABELA 'USUARIO'.
*/
$strTable = "usuario";
$SQL = "*";
$where = "LEFT JOIN perfil on perfil.id_perfil = usuario.id_perfil";
$objDB->dbSelect($strTable, $SQL, $where);
$numTotal = mysqli_num_rows($objDB->resultado);
/*
    VERIFICO SE A QUERY RETORNOU ALGUM RESULTADO.
*/
if ($numTotal > 0) {
    /*
        INICIO MINHA TABELA COMO VAZIA.
    */
    $table = "";
    /*
        LAÇO QUE ORGANIZA O RESULTADO DA QUERY,
        E MOSTRA NA TABELA.
    */
    for ($i = 0; $i < $numTotal; $i++) {
        $id = $objDB->mysqli_result($objDB->resultado, $i, "id_usuario");
        $nome =  $objDB->mysqli_result($objDB->resultado, $i, "nome");
        $username =  $objDB->mysqli_result($objDB->resultado, $i, "login");
        $cargo =  $objDB->mysqli_result($objDB->resultado, $i, "nome_perfil");
        $hdID = base64_encode($id);
        $table .=
            "<tr>
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
                        <form action=\"cadastro_usuario.php\" method=\"POST\" id=\"delUser\">
                            <input type=\"hidden\" name=\"id\" value=\"$hdID\">
                            <button class=\"ui button positive\">Visualizar</button>
                        </form>
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
    <script src="assets/js/DataTable.js"></script>
    <!--Scripts DataTable-->
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/dataTables.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/responsive.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <!-- SCRIPTS SEM USO NO MOMENTO
    <script src="assets/plugins/DataTables/Buttons-1.6.2/js/buttons.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script> 
    -->
    <!--Styles DataTable-->
    <link rel="stylesheet" href="assets/plugins/DataTables/DataTables-1.10.21/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/Responsive-2.2.5/css/responsive.semanticui.min.css">
    <!-- STYLE SEM USO NO MOMENTO
    <link rel="stylesheet" href="assets/plugins/DataTables/Buttons-1.6.2/css/buttons.semanticui.min.css">
    -->
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
                    <a class="section" href="dashboard.php">Página Inicial</a>
                    <i class="right arrow icon divider"></i>
                    <a class="section active">Usuários</a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABELA DE DADOS -->
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
                        <?= $table ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DIV QUE FECHA O TEMPLATE 'MENU' -->
    </div>
</body>

</html>