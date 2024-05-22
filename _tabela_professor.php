<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');


    $query = "select id_admin,Nome_adm,Cpf_adm,setor_adm,sesao_adm,Ativo from administrador where Cpf_adm = '{$_SESSION['Cpf_adm']}' and id_admin = '{$_SESSION['id_admin']}'";
    $resul = $conn->query($query);

    $mysql_query = "SELECT * FROM professor ORDER BY id_proff ASC ";
    $mysql_resul = $conn->query($mysql_query);

    $row = mysqli_num_rows($resul);

    if($row == 1){
        while($user = mysqli_fetch_assoc($resul)){
            $Nome_adm = $user['Nome_adm'];
        }
    }
    else{
        // echo "nãoexiste";
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
    <h4 class="free-contente2" style="margin-left:-30px;">Selecione a Ficha do Professor(a) <?php echo $Nome_adm;?></h4>
    <?php
            if(isset($_SESSION['par_ennor'])):
                ?>
                 <div id="alert_erro_1020" class="alert_min"><div class="sub_alert_erro_1020" style="display:flex;">Acesso Negado Erro 1020<img class="img-alert" src="img/Alert.png"></div></div>
                <?php
                    unset($_SESSION['par_ennor']);
                    endif;
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
                    <th>Ativo</th>
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
                                        header("Location:_tabela_professor.php?adm={$_SESSION['id_admin']}");
                                        return false;
                                    }
                                    else{
                                        
                                    
                                        while($user_proff = mysqli_fetch_assoc($mysql_resul)){
                                        echo "<tr>";
                                        echo "<td>".$user_proff ['id_proff']."</td>";
                                        echo "<td>".$user_proff ['Nome_proff']."</td>";
                                        echo "<td>".$user_proff ['Cpf_proff']."</td>";
                                        echo "<td>".$user_proff ['Ativo_proff']."</td>";
                                        echo"<td><a href='_list_proff.php?prof=$user_proff[id_proff]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'  viewBox='0 0 16 16'>
                                        <path d='M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/>
                                        <path d='M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z'/>
                                        </td>";
                                        echo "<td><a href='_edit_proff.php?prof=$user_proff[id_proff]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
                                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                        </svg></a></td>";
                                        echo "<td><a href='_del_proff.php?prof=$user_proff[id_proff]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'  viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                        </svg></a></td>";
                                        echo "</tr>";
                                        }

                                        
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