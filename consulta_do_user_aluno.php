<?php

session_start();
include_once('cofing.php');
include('verificar_login_aluno.php');

$query = "select id_aluno,Cpf_aluno,sessao_aluno,Ativo_aluno from aluno where Cpf_aluno =  '{$_SESSION['Cpf_aluno']}' and id_aluno = '{$_SESSION['id_aluno']}' and senha_aluno = '{$_SESSION['senha_aluno']}'";
$resul = $conn->query($query);

$query_mysql = "SELECT * FROM aluno WHERE id_aluno ='{$_SESSION['id_aluno']}'";
$resul = mysqli_query($conn,$query_mysql);






// $nome= "%".trim($_GET['nome'])."%";
// $db = new PDO('mysql:host=127.0.0.1;dbname=login', 'root','');
// $cns = $db->prepare('SELECT * FROM `frequencia_dados` WHERE `Nome` LIKE :Nome');

// $cns->bindParam(':Nome',$nome,PDO::PARAM_STR);

// $cns->execute();

// $result = $cns->fetchAll(PDO::FETCH_ASSOC);

// // print_r($result);



//if(count($result)){
//foreach($result as $Resultados){
//echo($Resultados['nome']),"  ",($Resultados['dataTm']),"  ",($Resultados['frq_aluno']);
// echo "\n";
// echo "    ";
//     }
// }
// else{
//     echo "Não Foi Encontados Resultados";
// }               
       
// if(isset($_GET['aluno'])){

//     if(empty($_GET['aluno'])){

//     }
//     else{

           
        $nome= "%".trim($_GET['aluno'])."%";
        $db = new PDO('mysql:host=...;dbname=...', '...','...');
        $cns = $db->prepare('SELECT * FROM `frequencia` WHERE `Nome_aluno` LIKE :Nome_aluno');

        $cns->bindParam(':Nome_aluno',$nome,PDO::PARAM_STR);

        $cns->execute();

        $result = $cns->fetchAll(PDO::FETCH_ASSOC);

    

//     }
   

// }


?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Painel aluno(a)</title>
</head>
<body>
<div class="conteiner-back">
    <img src="img/fundo.png" class="img_box">
    <h2 class="free-contente">Painel do aluno(a)</h2>
    <h4 class="free-contente2" style="margin-left:-30px;">Pesquisar na Ficha  <?php echo $_SESSION['Nome_aluno'];?></h4>
    <?php
    if(isset($_SESSION['par_ennor'])):
    ?>
    <div id="alert_erro_1020" class="alert_min"><div class="sub_alert_erro_1020" style="display:flex;">Acesso Negado Erro 1020<img class="img-alert" src="img/Alert.png"></div></div>
    <?php
        unset($_SESSION['par_ennor']);
        endif;
    ?>
    <div class="tela_adm" style="margin:10px 0 0 0;width:1300px;">
        <div class="sub_tela_adm" style="width:1270px;" >
        <div class="tabela_sistema">
        <div class="m-4" class="w-100 p-3">
        <table  class="table"  class="w-100 p-3">
            <tbody>

                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>curso</th>
                    <th>data</th>
                    <th>hora</th>
                    <th>sala</th>
                    <th>Turno</th>
                    <th>Presença</th>
                </tr>
                <?php
                    if(isset($_GET['aluno']) || isset($_SESSION['id_aluno'])){
                        // echo "true"
                  
                          if(empty($_GET['aluno']) || empty($_SESSION['id_aluno'])){
                              // echo "falso";
                          }
                          else{
                  
                              $id_aluno = $_GET['aluno'];
                              $id_sessi = $_SESSION['id_aluno'];
                  
                                  if($id_aluno == "" || $id_sessi ==""){
                                      // echo "falso";
                                  }
                                  else{
            
                                                    if(count($result)){
                                                        foreach($result as $Resultados){
                                                            echo "<tr>";
                                                            echo "<td>".$Resultados['id_aluno']."</td>";
                                                            echo "<td>".$Resultados['Nome_aluno']."</td>";
                                                            echo "<td>".$Resultados['Cpf_aluno']."</td>";
                                                            echo "<td>".$Resultados['curso']."</td>";
                                                            echo "<td>".$Resultados['datafr']."</td>";
                                                            echo "<td>".$Resultados['hora']."</td>";
                                                            echo "<td>".$Resultados['sala']."</td>";
                                                            echo "<td>".$Resultados['Turno']."</td>";
                                                            echo "<td>".$Resultados['presenca']."</td>";
                                                            
                                                            echo "</tr>";
                                                            
                                                        }
                                                    }
                                                    else{
                                                            echo "Não Foi Encontados Resultados";
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


