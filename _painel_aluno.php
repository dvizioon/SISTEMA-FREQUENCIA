<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_aluno.php');

    $query = "select id_aluno,Cpf_aluno,sessao_aluno,Ativo_aluno from aluno where Cpf_aluno =  '{$_SESSION['Cpf_aluno']}' and id_aluno = '{$_SESSION['id_aluno']}' and senha_aluno = '{$_SESSION['senha_aluno']}'";
    $resul = $conn->query($query);

    $query_mysql = "SELECT * FROM aluno WHERE id_aluno ='{$_SESSION['id_aluno']}'";
    $resul = mysqli_query($conn,$query_mysql);

    while($user = mysqli_fetch_assoc($resul)){
        $id_aluno = $user['id_aluno'];
        $Nome_aluno = $user['Nome_aluno'];
        $cpf_aluno = $user['Cpf_aluno'];
        $curso_aluno = $user['curso'];
    }

    


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <title>Painel aluno(a)</title>
</head>
<body>
<div class="conteiner-back">
    <img src="img/fundo.png" class="img_box">
    <h2 class="free-contente">Painel do aluno(a)</h2>
    <h4 class="free-contente2" style="margin-left:-30px;">Bem-vindo de volta aluno(a) <?php echo $Nome_aluno;?></h4>

    <div class="tela_adm">
        <div class="sub_tela_adm">
        <div class="sessão_intena">
            <?php
                echo "<a href='_logout_aluno.php?id={$_SESSION['id_aluno']}' onmouseover='trocar_svg()' onmouseout='destrocar()' class='link_logout'><img src='img/door-open.svg' alt='' srcset='' class='open'></a>";
            ?>
               Última Sessão <?php echo $_SESSION['sessao_aluno'];?>
        </div>
            <?php
            if(isset($_SESSION['succed'])):
            ?>
               <div id="alert_yes_id" style="position:absolute;top:75%;left:46%; transform: translate(-50%,-50%); width:550px;"><div class="sub_alert_yes_id" style="display:flex;width:460px;">Volte Amanhã Aluno(a) <?php echo $Nome_aluno;?> </div></div>
        
            <?php
            endif;
            ?>
        <div class="box_func_very" style="left:45%; transform: translate(-50%,0);">
            <fieldset class="border_fild_very">
                <legend class="border_legend_very">Caixa de Ferramentas</legend>
            <?php
                if(!isset($_SESSION['btn'])):
            ?>
            <?php
                  echo "<form action='_logica_btn.php?alun=$_SESSION[id_aluno]' method='POST'><button name='submit' type='submit' class='btn_func'>Registrar Frequência</button></form>";
            ?>
            <?php
                unset($_SESSION['btn']);
                endif;
            ?>
            <?php
                echo "<button class='btn_func'><a href='_perfil_aluno_ficha.php?alun=$_SESSION[id_aluno]'>Perfil</a></button>";
            ?>
            <?php
                echo "<button class='btn_func'><a href='consulta_do_user_aluno.php?aluno=$_SESSION[Nome_aluno]'>Relatório</a></button>";
            ?>
            </fieldset>
        </div>
        
    </div>
</div>
   <script src="js/node.js"></script>
</body>
</html>
