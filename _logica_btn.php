<?php
        session_start();
        include_once('cofing.php');
        include('verificar_login_aluno.php');

        $query = "select id_aluno,Cpf_aluno,sessao_aluno,Ativo_aluno from aluno where Cpf_aluno =  '{$_SESSION['Cpf_aluno']}' and id_aluno = '{$_SESSION['id_aluno']}' and senha_aluno = '{$_SESSION['senha_aluno']}'";
        $resul = $conn->query($query);

        $query_mysql = "SELECT * FROM aluno WHERE id_aluno ='{$_SESSION['id_aluno']}'";
        $resul = mysqli_query($conn,$query_mysql);

        if(isset($_POST['submit'])){

        if(isset($_GET['alun']) || isset($_SESSION['id_aluno'])){

            if(empty($_GET['alun']) || empty($_SESSION['id_aluno'])){
                

            }
            else{
                $id_aluno = $_GET['alun'];
                $id_sessi = $_SESSION['id_aluno'];

                if($id_aluno !== $id_sessi){
                    echo "Enviado";
                }
                else{

                    echo "Enviado";

                    while($user_data = mysqli_fetch_assoc($resul)){
                        $name_alun = $user_data['Nome_aluno'];
                        $cpf_alun = $user_data['Cpf_aluno'];
                        $op_curso = $user_data['curso'];
                        $sala_alun = $user_data['sala'];
                        $op_turno = $user_data['Turno'];
                    }

                        
                    date_default_timezone_set('America/Sao_Paulo');
                    // $data = date('d/m/Y\T\H:i');
                    $d = date('d');
                    $m = date('m');
                    $y = date('Y');
                    $h = date('H');
                    $i = date('i');

                    $all = $d."-".$m."-".$y;
                    $hor = $h.":".$i;
                    $P = "P";

    
                    $update_mysql = mysqli_query($conn,"INSERT INTO frequencia(Nome_aluno,Cpf_aluno,curso,datafr,hora,sala,Turno,presenca) VALUES('$name_alun','$cpf_alun','$op_curso','$all','$hor','$sala_alun','$op_turno','$P')");
                    $del_user_dupli = "DELETE p1 FROM `frequencia` AS p1, `frequencia` AS p2 WHERE p1.`id_aluno`<p2.`id_aluno` AND p1.`datafr`=p2.`datafr`;";
                    // $safe_mod_on = "SET SQL_SAFE_UPDATES=0";
                    // $saf_relut = mysqli_query($safe_mod_on);
                    $mysql_result = $conn->query($del_user_dupli);
                    
                    $_SESSION['succed'] = true;
                    $_SESSION['btn'] = true;
                    header("Location:_painel_aluno.php");
                    clearstatcache();
                    



                }
            }



        }
    }




?>
