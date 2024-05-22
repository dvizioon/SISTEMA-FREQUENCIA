<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');


    $query = "select id_admin,Nome_adm,Cpf_adm,setor_adm,sesao_adm,Ativo from administrador where Cpf_adm = '{$_SESSION['Cpf_adm']}' and id_admin = '{$_SESSION['id_admin']}'";
    $resul = $conn->query($query);
    
    $conexao_query = "SELECT * FROM administrador ORDER BY id_admin ASC ";
    $result_query = $conn->query($conexao_query);

    $query_mysql = "SELECT * FROM administrador WHERE id_admin ='{$_SESSION['id_admin']}'";
    $result = mysqli_query($conn,$query_mysql);

    while($user = mysqli_fetch_assoc($result)){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Painel Adminstrador(a)</title>
</head>
<body>
<div class="conteiner-back">
    <img src="img/fundo.png" class="img_box">
    <h2 class="free-contente">Painel do Adminstrador(a)</h2>
    <h4 class="free-contente2" style="margin-left:-30px;">Selecione a Ficha Adminstrador(a) <?php echo $Nome_adm;?></h4>
    <?php
            if(isset($_SESSION['par_ennor'])):
                ?>
                 <div id="alert_erro_1020" class="alert_min"><div class="sub_alert_erro_1020" style="display:flex;">Acesso Negado Erro 1020<img class="img-alert" src="img/Alert.png"></div></div>
                <?php
                    unset($_SESSION['par_ennor']);
                    endif;
                ?>

    ?>
    <div class="tela_adm" style="margin:10px 0 0 0;">
        <div class="sub_tela_adm">
        <div class="tabela_sistema">
        <div class="m-4" id="TD">
        <table  class="table" id="Tb">
            <tbody>

                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Setor</th>
                    <th>List</th>
                </tr>
                    <?php

                        if(!isset($_GET['adm']) || !isset($_SESSION['id_admin'])){
                            // Não existe; 
                        }
                        else{
                            if(empty($_GET['adm']) || empty($_SESSION['id_admin'])){
                            // Não existe;
                            }
                            else{
                                $Id_admin = $_SESSION['id_admin'];
                                $id_Admin = $_GET['adm'];
                                
                                    if($id_Admin == "" || $Id_admin == ""){
                                        // Não existe;
                                    }
                                    else{

                                    if($Id_admin !== $id_Admin){
                                        $_SESSION['par_ennor'] = true;
                                        header("Location:_tabela_administrador.php?adm={$_SESSION['id_admin']}");
                                        return false;
                                    }
                                    else{
                                        
                                        // while($user_data = mysqli_fetch_object($resul)){
                            
                                        //     $Nome_Admim = $user_data->Nome_adm;
                                        //     $Cpf_Adm = $user_data->Cpf_adm;
                                        //     $Setor_Adm = $user_data->setor_adm;
                                        // }

                                        while($user = mysqli_fetch_assoc($result_query)){
                                        echo "<tr>";
                                        echo "<td>".$user['id_admin']."</td>";
                                        echo "<td>".$user['Nome_adm']."</td>";
                                        echo "<td>".$user['Cpf_adm']."</td>";
                                        echo "<td>".$user['setor_adm']."</td>";
                                        echo "<td><a href='_lista_adm.php?list=$user[id_admin]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'  viewBox='0 0 16 16'>
                                        <path d='M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/>
                                        <path d='M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z'/>
                                            </svg></a></td>";
                                        echo "</tr>";
                                        }

                                        // echo $Id_admin," ", $Nome_Admim," ",$Cpf_Adm," ",$Setor_Adm="Administração","<a href=''>Link</a>";
                                        
                                    }

                                    }
                            }
                        }

                ?>
            </tbody>
        </table>
            
        </div>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="js/node.js"></script>
</body>
</html>