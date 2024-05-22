<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_proff.php');

    
    $query = "select id_proff,Cpf_proff,sessao,Ativo_proff from professor where Cpf_proff =  '{$_SESSION['Cpf_proff']}' and id_proff = '{$_SESSION['id_proff']}' and senha_proff = '{$_SESSION['senha_proff']}'";
    $resul = $conn->query($query);

    $mysql_query = "SELECT * FROM aluno ORDER BY id_aluno ASC";
    $mysql_resul = mysqli_query($conn,$mysql_query);

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
    <h4 class="free-contente2" style="margin-left:-30px;">Selecione a Ficha do Professor(a) <?php echo $_SESSION['Nome_proff'];?></h4>
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
                    if(isset($_GET['alun']) || isset($_SESSION['id_proff'])){
                        // echo "true"
                  
                          if(empty($_GET['alun']) || empty($_SESSION['id_proff'])){
                              // echo "falso";
                          }
                          else{
                  
                              $id_aluno = $_GET['alun'];
                              $id_sessi = $_SESSION['id_proff'];
                  
                                  if($id_aluno == "" || $id_sessi ==""){
                                      // echo "falso";
                                  }
                                  else{
                  
                                          if($id_aluno !== $id_sessi || $id_sessi !== $id_aluno){
                                              // echo "falso";
                                          }
                                          else{
                  
                                              
                  
                                                  while($user_aluno = mysqli_fetch_assoc($mysql_resul)){
                                                    echo "<tr>";
                                                    echo "<td>".$user_aluno ['id_aluno']."</td>";
                                                    echo "<td>".$user_aluno ['Nome_aluno']."</td>";
                                                    echo "<td>".$user_aluno ['Cpf_aluno']."</td>";
                                                    echo "<td>".$user_aluno ['Ativo_aluno']."</td>";
                                                    echo"<td><a href='_consulta_aluno.php?aluno=$user_aluno[Nome_aluno]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                                    </svg></a>
                                                    </td>";
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



