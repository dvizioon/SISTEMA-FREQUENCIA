<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');

    $query = "select id_admin,Cpf_adm,Ativo,setor_adm from administrador where Cpf_adm = '{$_SESSION['Cpf_adm']}' and Ativo ='{$_SESSION['Ativo']}'";
    $resul = mysqli_query($conn,$query);


    // while($user = mysqli_fetch_object($resul)){
    //     $Nome_adm = $user->Nome_adm;
    //     $Cpf_adm = $user->Cpf_adm;
    //     $Setor_adm = $user->setor_adm;
    //     $Ativo = $user->Ativo;
        
    // }

    if(isset($_GET['adm'])){

        $id = $_GET['adm'];

        if($id == ""){

        }
        else{

            if($id !== $_SESSION['id_admin']){
                    $_SESSION['par_ennor'] = true;
                    header("Location:ficha_principal_adm.php?adm={$_SESSION['id_admin']}");
                    return false;
            }
            else{
                $query_mysql = "SELECT * FROM administrador WHERE id_admin ='{$id}'";
                $resul = mysqli_query($conn,$query_mysql);
    
                while($user = mysqli_fetch_assoc($resul)){
                    $id_adm = $user['id_admin'];
                    $Nome_adm = $user['Nome_adm'];
                    $cpf_adm = $user['Cpf_adm'];
                    $Setor_adm = $user['setor_adm'];
                }
       
            }

        }

    }

    




?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <title>Lista do Adminstrador(a)</title>
</head>
<body>
<div class="conteiner-back">
    <img src="img/fundo.png" class="img_box">
    <h2 class="free-contente">Lista do Adminstrador(a)</h2>
    <h4 class="free-contente2" style="margin-left:-30px;">Ficha do Adminstrador(a) <?php echo $Nome_adm; ?></h4>
    <?php
        if(isset($_SESSION['Not_name'])):
    ?>
     <div id="alert_name" class="alert_min"><div class="sub_alert_name" style="display:flex;">Nome Vazio...<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['Not_name']);
        endif;
    ?>
     <?php
        if(isset($_SESSION['Not_cpf'])):
    ?>
     <div id="alert_setor" class="alert_min"><div class="sub_alert_setor" style="display:flex;">Escolha o Setor...<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['Not_cpf']);
        endif;
    ?>
    <?php
        if(isset($_SESSION['Not_setor'])):
    ?>
     <div id="alert_setor" class="alert_min"><div class="sub_alert_setor" style="display:flex;">Escolha o Setor...<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['Not_setor']);
        endif;
    ?>
    <?php
        if(isset($_SESSION['sucess_adm'])):
    ?>
    <div id="alert_yes_adm" class="alert_min"><div class="sub_alert_yes_adm" style="display:flex;">Dados Atualizados <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
    </svg></div></div>
    <?php
        unset($_SESSION['sucess_adm']);
        endif;
    ?>
    <?php
        if(isset($_SESSION['par_ennor'])):
    ?>
     <div id="alert_erro_1020" class="alert_min"><div class="sub_alert_erro_1020" style="display:flex;">Acesso Negado Erro 1020<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['par_ennor']);
        endif;
    ?>
    <div class="car_box_principal">
        <div class="sub_car_box_principal">
            <div class="name_user_principal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" cla fill="#FFF" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg>
                <?php
                   echo "<h1>".$Nome_adm."</h1>";
                ?>
            </div>

            <div class="cpf_user_principal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF"  viewBox="0 0 16 16">
            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            </svg>
                <?php
                     echo "<h1>".$cpf_adm."</h1>";
                ?>
            </div>

            <div class="cpf_user_principal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF" viewBox="0 0 16 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                </svg>
                <?php
                   echo "<h1>".$Setor_adm ."</h1>";
                ?>
            </div>

            <div class="name_user_principal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
                <?php
                   echo "<h1>".$_SESSION['Ativo']."</h1>"; 
                ?>
            </div>

            </div>

            <div class="sub_car_box_principal2">
            <form action="edit.php" method="POST">
            <div class="name_user_principal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" cla fill="#FFF" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg>
                <?php
                   echo "<input type='text' name='edit_name' class='cpf_user_principal_input' placeholder='Nome...' value='{$Nome_adm}' required >";
                ?>
            </div>

            <div class="cpf_user_principal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF"  viewBox="0 0 16 16">
            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            </svg>
                <?php
                   echo "<input type='text' name='edit_cpf' class='cpf_user_principal_input' placeholder='Cpf...' value='{$cpf_adm}' required >";
                ?>
            </div>

            <div class="cpf_user_principal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF" viewBox="0 0 16 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                </svg>
                <?php
                   echo "<select class='cpf_user_principal_input' name='edit_administracao'>
                   <option value='not_setor'>Setor...</option>
                   <option value='{$Setor_adm}'>Padrão...</option>
                   </select>";
                ?>
            </div>
            <div class="cpf_user_principal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
            </svg>
                <?php
                   echo "<input type='hidden' name='id_user_edit'value='{$id_adm}'>";
                   echo "<input type='submit' name='update_submit' class='cpf_user_principal_saved' value='Enviar' >";
                ?>
            </div>

            </form>

            </div>
            
    </div>

</div>
<script src="js/node.js"></script>
</body>
</html>

