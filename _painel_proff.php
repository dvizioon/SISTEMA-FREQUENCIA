<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_proff.php');

    $query = "select id_proff,Cpf_proff,sessao,Ativo_proff,Nome_proff,sala,Turno from professor where Cpf_proff =  '{$_SESSION['Cpf_proff']}' and id_proff = '{$_SESSION['id_proff']}' and senha_proff = '{$_SESSION['senha_proff']}'";
    $resul = $conn->query($query);

    $query_mysql = "SELECT * FROM professor WHERE id_proff ='{$_SESSION['id_proff']}'";
    $resul = mysqli_query($conn,$query_mysql);

    while($user = mysqli_fetch_assoc($resul)){
        $id_proff = $user['id_proff'];
        $Nome_proff = $user['Nome_proff'];
        $cpf_proff = $user['Cpf_proff'];
        $curso_proff = $user['curso'];
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <title>Painel Professor(a)</title>
</head>
<body>
<div class="conteiner-back">
    <img src="img/fundo.png" class="img_box">
    <h2 class="free-contente">Painel do Professor(a)</h2>
    <h4 class="free-contente2" style="margin-left:-30px;">Bem-vindo de volta Professor(a) <?php echo $Nome_proff;?></h4>

    <div class="tela_adm">
        <div class="sub_tela_adm">
        <div class="sessão_intena">
            <?php
                echo "<a href='_logout_proff.php?id={$_SESSION['id_proff']}' onmouseover='trocar_svg()' onmouseout='destrocar()' class='link_logout'><img src='img/door-open.svg' alt='' srcset='' class='open'></a>";
            ?>
               Última Sessão <?php echo $_SESSION['sessao'];?>
        </div>
        <div class="box_func_very" style="left:45%; transform: translate(-50%,0);">
            <fieldset class="border_fild_very">
                <legend class="border_legend_very">Caixa de Feramentas</legend>
            <?php
                echo "<button class='btn_func'><a href='_proff_list_alun.php?alun=$_SESSION[id_proff]'>Tabela Aluno</a></button>";
            ?>
            <?php
                echo "<button class='btn_func'><a href='_perfil_proff.php?prof=$_SESSION[id_proff]'>Perfil</a></button>";
            ?>
            <?php
                echo "<button class='btn_func'><a href='_pesquisar_alun_faltas.php?alun=$_SESSION[id_proff]'>Relatório dos Alunos</a></button>";
            ?>
            </fieldset>
        </div>
        
    </div>
</div>
   <script src="js/node.js"></script>
</body>
</html>
