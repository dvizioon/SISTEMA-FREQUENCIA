<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');

    $query = "select id_admin,Cpf_adm,sesao_adm,Ativo from administrador where Cpf_adm = '{$_SESSION['Cpf_adm']}' and id_admin = '{$_SESSION['id_admin']}'";
    $resul = $conn->query($query);

    $query_mysql = "SELECT * FROM administrador WHERE id_admin ='{$_SESSION['id_admin']}'";
    $resul = mysqli_query($conn,$query_mysql);

    while($user = mysqli_fetch_assoc($resul)){
        $id_adm = $user['id_admin'];
        $Nome_adm = $user['Nome_adm'];
        $cpf_adm = $user['Cpf_adm'];
        $Setor_adm = $user['setor_adm'];
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <title>Painel Adminstrador(a)</title>
</head>
<body>
<div class="conteiner-back">
    <img src="img/fundo.png" class="img_box">
    <h2 class="free-contente">Painel do Adminstrador(a)</h2>
    <h4 class="free-contente2" style="margin-left:-30px;">Bem-vindo de volta Adminstrador(a) <?php echo $Nome_adm;?></h4>

    <div class="tela_adm">
        <div class="sub_tela_adm">
        <div class="sessão_intena">
            <?php
                echo "<a href='_logout_adm.php?id={$_SESSION['id_admin']}' onmouseover='trocar_svg()' onmouseout='destrocar()' class='link_logout'><img src='img/door-open.svg' alt='' srcset='' class='open'></a>";
            ?>
               Última Sessão <?php echo $_SESSION['sesao_adm'];?>
        </div>
        <div class="box_func_very">
            <fieldset class="border_fild_very">
                <legend class="border_legend_very">Informações Usúario</legend>
            <?php
                echo "<button class='btn_func'><a href='_tabela_administrador.php?adm=$_SESSION[id_admin]'>Tabela Administrador</a></button>";
            ?>
            <?php
                echo "<button class='btn_func'><a href='_tabela_professor.php?adm=$_SESSION[id_admin]'>Tabela Professor</a></button>";
            ?>
            <?php
                echo "<button class='btn_func'><a href='_tabela_aluno.php?adm=$_SESSION[id_admin]'>Tabela Aluno</a></button>";
            ?>
            </fieldset>
        </div>
        <div class="box_func_add">
        <fieldset class="border_fild_very">
                <legend class="border_legend_very">Adicionar Usúario</legend>
                <?php
                echo "<button class='btn_func'><a href='_add_adm.php?adm=$_SESSION[id_admin]'>Adicionar Administrador</a></button>";
                ?>
                <?php
                echo "<button class='btn_func'><a href='_add_prof.php?prof=$_SESSION[id_admin]'>Adicionar Professor</a></button>";
                ?>
                <?php
                echo "<button class='btn_func'><a href='_add_alun.php?alun=$_SESSION[id_admin]'>Adicionar Aluno</a></button>";
                ?>
        </fieldset>
        </div>
        </div>
    </div>
</div>
   <script src="js/node.js"></script>
</body>
</html>