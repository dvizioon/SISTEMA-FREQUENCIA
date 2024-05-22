<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');

    $query = "select id_admin,Nome_adm,Cpf_adm,setor_adm,sesao_adm,Ativo from administrador where Cpf_adm = '{$_SESSION['Cpf_adm']}' and id_admin = '{$_SESSION['id_admin']}'";
    $resul = $conn->query($query);

    $query_mysql = "SELECT * FROM administrador WHERE id_admin ='{$_SESSION['id_admin']}'";
    $result = mysqli_query($conn,$query_mysql);

    while($user = mysqli_fetch_object($resul)){
        $id = $user->id_admin;
    }



    if(isset($_GET['list']) || isset($_SESSION['id_admin'])){

        $list_admin = $_GET['list'];
        $list_sesio = $_SESSION['id_admin'];
        
        if($list_admin == "" || $list_sesio == ""){
            // não existe
        }
        else{

            if($list_admin == $list_sesio){

                $_SESSION['fichar_admin'] = true;
                while($user = mysqli_fetch_assoc($result)){
                    $Id = $user['id_admin'];
                    header("Location:ficha_principal_adm.php?adm={$id}");
                }
                
                
            
            }
            else{

                
                $id_admin_list= "%".trim($_GET['list'])."%";
                $db = new PDO('mysql:host=127.0.0.1;dbname=login', 'root','');
                $cns = $db->prepare('SELECT * FROM `administrador` WHERE `id_admin` LIKE :id_admin');

                $cns->bindParam(':id_admin',$id_admin_list,PDO::PARAM_STR);

                $cns->execute();

                $result = $cns->fetchAll(PDO::FETCH_ASSOC);

                
            }

        }


    }
    else{
        //  Não exixte;
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
    <p>
    <?php 

            if(isset($_GET['list'])){

                $list_trim= $_GET['list'];

                if($list_trim == ""){
                    echo "Sem Resultados";
                }
                else{

                        if(count($result)){
                            foreach($result as $Resultados){
                                $Nome_adm = $Resultados['Nome_adm'];
                                $Cpf_adm = $Resultados['Cpf_adm'];
                                $Setor_adm = $Resultados['setor_adm'];
                                $ativo = $Resultados['Ativo'];
                                // echo("Ficha do Adminitrador Secundario  ".$Resultados['id_admin'])," ",$Resultados['Nome_adm'];
                            }
                        }
                        else{
                            echo "Sem Resultados";
                        }
                    }
                }
                
            else{
                echo "Sem Resultados";
            }


    ?>
</p>
    <h4 class="free-contente2" style="margin-left:-30px;">Ficha do Adminstrador <?php echo $Nome_adm; ?></h4>

    <div class="car_box">
        <div class="sub_car_box">
            <div class="name_user">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" cla fill="#FFF" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg>
                <?php
                    echo "<h1>Nome : ".$Nome_adm."</h1>";
                ?>
            </div>

            <div class="cpf_user">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF"  viewBox="0 0 16 16">
            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            </svg>
                <?php
                    echo "<h1>".$Cpf_adm="xxx.xxx.xxx-xx"."</h1>";
                ?>
            </div>

            <div class="cpf_user">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF" viewBox="0 0 16 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                </svg>
                <?php
                    echo "<h1>".$Setor_adm."</h1>";
                ?>
            </div>

            <div class="cpf_user">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFF" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
                <?php
                    echo "<h1> Status : ".$ativo."</h1>";
                ?>
            </div>

            
        </div>
    </div>
</div>
   <script src="js/node.js"></script>
</body>
</html>

