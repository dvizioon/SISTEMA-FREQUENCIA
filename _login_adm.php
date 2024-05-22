<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <title>Login Adminstrador(a)</title>
</head>
<body>
<div class="conteiner-back">
    <div>
        <nav class="nav_link">
            <ul>
                <li><a href="_loogin_proff.php">Login Professor(a)</a></li>
                <li><a href="_login_aluno.php">Login Aluno(a)</a></li>
            </ul>
        </nav>
    </div>

    <img src="img/fundo.png" class="img_box">
    <h1 class="free-contente">Login do Adminstrador(a)</h1>
    <div class="box-01"></div>
    <div class="box-01"></div>
    <h4 class="free-contente2">Sistema de Frequência</h4>

    <div class="arquivos">
        <div class="beta_archiver">
                <button class="btn_archiver">📂</button>
                <span style="list-style-type: square;" class="span">Fechada</span>
        </div>
        <div class="alfa_archiver" style="display:none;">
            <button class="btn_beta_archiver">📂</button>
            <span style="list-style-type: square;"><a href="./Suporte/_about.html">Sobre</a></span>
        </div>
        <div class="zone_archiver" style="display:none;"  >
            <button class="btn_archiver">📁</button>
            <span style="list-style-type: square;"><a href="./Suporte/_suporte.html">Suport</a></span>
        </div>
    </div>
    <?php
        if(isset($_SESSION['not_cpf'])):
    ?>
    <div id="alert_cpf" class="alert_min" ><div class="sub_alert_cpf" style="display:flex;">CPF Vazio<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['not_cpf']);
        endif;
    ?>
    <?php
        if(isset($_SESSION['not_key'])):
    ?>
      <div id="alert_key" class="alert_min" ><div class="sub_alert_key" style="display:flex;">Senha vazia<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['not_key']);
        endif;
    ?>
     <?php
        if(isset($_SESSION['not_set'])):
    ?>
       <div id="alert_set" class="alert_min" ><div class="sub_alert_set" style="display:flex;">Setor vazio<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['not_set']);
        endif;
    ?>
    <?php
        if(isset($_SESSION['not_user'])):
    ?>
       <div id="alert_not_user" class="alert_min"><div class="sub_alert_not_user" style="display:flex;">Adminstrador Não Encontrado<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['not_user']);
        endif;
    ?>
    <?php
        if(isset($_SESSION['yes_id'])):
    ?>
       <div id="alert_yes_id" class="alert_min"><div class="sub_alert_yes_id" style="display:flex;">Obrigado Volte Sempre</div></div>
    <?php
        unset($_SESSION['yes_id']);
        endif;
    ?>
   <div class="conteiner-login">
        <form name="form_login" method="POST" action="validacao_login_adm.php">
        <fieldset class="contente-login">
            <legend class="contente-legend">Login Admin</legend>
            <div class="box-input">
                <fieldset class="box-fild">
                    <legend class="box-legend">CPF</legend>
                    <input type="text"  placeholder="Digite seu CPF..." name="cpf_adm" >
                </fieldset>
            </div>
            <div class="box-input">
                <fieldset class="box-fild">
                    <legend class="box-legend">Senha</legend>
                    <input type="password" placeholder="Digite sua Senha..." name="senha_adm">
                </fieldset>
            </div>
            <div class="box-input">
                <fieldset class="box-fild">
                    <legend class="box-legend">Setor</legend>
                 <select class="select_option_curso" name="select_op_adm">
                    <option value="setor">Setor...</option>
                    <option value="administracao">Adminstração</option>
                 </select>
                </fieldset>
            </div>
            <div class="box-input">
                <button class="submit_entar_btn" name="submit_adm">Entrar</button>
            </div>
        </fieldset>
        </form>
   </div> 
   </div>
   <div vw class="enabled">
    <div vw-access-button class="active" ></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
   <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script> 
   <script src="js/node.js"></script>
</body>
</html>