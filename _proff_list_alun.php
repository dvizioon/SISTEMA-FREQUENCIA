<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_proff.php');


    $query = "select id_proff,Nome_proff,Cpf_proff,sessao,Ativo_proff from professor where Cpf_proff = '{$_SESSION['Cpf_proff']}' and id_proff = '{$_SESSION['id_proff']}'";
    $resul = $conn->query($query);

    $mysql_query = "SELECT * FROM aluno ORDER BY id_aluno ASC ";
    $mysql_resul = $conn->query($mysql_query);

    $row = mysqli_num_rows($resul);

    if($row == 1){
        while($user = mysqli_fetch_assoc($resul)){
            $Nome_proff = $user['Nome_proff'];
        }
    }
    else{
        // echo "nãoexiste";
    }
    // echo $_SESSION['id_proff'];
    // echo $_GET['alun'];
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
    <h4 class="free-contente2" style="margin-left:-30px;">Selecione a Ficha do Professor(a) <?php echo $Nome_proff;?></h4>
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

                        if(!isset($_GET['alun']) || !isset($_SESSION['id_proff'])){
                            header("Location:_proff_list_alun.php?alun={$_SESSION['id_proff']}");
                                return false;
                        }
                        else{
                            if(empty($_GET['alun']) || empty($_SESSION['id_proff'])){
                                header("Location:_proff_list_alun.php?alun={$_SESSION['id_proff']}");
                                return false;
                            }
                            else{
                                $Id_admin = $_SESSION['id_proff'];
                                $id_Admin = $_GET['alun'];
                                
                                    if($id_Admin == "" || $Id_admin == ""){
                                        header("Location:_proff_list_alun.php?alun={$_SESSION['id_proff']}");
                                        return false;
                                    }
                                    else{

                                    if($Id_admin !== $id_Admin || $id_Admin !== $Id_admin){
                                        $_SESSION['par_ennor'];
                                        header("Location:_proff_list_alun.php?alun={$_SESSION['id_proff']}");
                                        return false;
                                    }
                                    else{
                                    
                                        while($user_aluno = mysqli_fetch_assoc($mysql_resul)){
                                        echo "<tr>";
                                        echo "<td>".$user_aluno ['id_aluno']."</td>";
                                        echo "<td>".$user_aluno ['Nome_aluno']."</td>";
                                        echo "<td>".$user_aluno ['Cpf_aluno']."</td>";
                                        echo "<td>".$user_aluno ['Ativo_aluno']."</td>";
                                        echo"<td><a href='_list_alun_proff_vier.php?alun=$user_aluno[id_aluno]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'  viewBox='0 0 16 16'>
                                        <path d='M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/>
                                        <path d='M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z'/>
                                        </a></td>";
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