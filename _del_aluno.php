<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');

    $mysql_query = "SELECT * FROM aluno WHERE id_aluno='{$_GET['alun']}'";
    $mysql_resul = $conn->query($mysql_query);
    

    $row = mysqli_num_rows($mysql_resul);

    if($row == "1"){
        if(isset($_GET['alun'])){

            if(!empty($_GET['alun'])){

                while($user = mysqli_fetch_object($mysql_resul)){
                    $id_aluno = $user->id_aluno;
                }

                $del_id = $_GET['alun'];
    
                if($del_id !== $id_aluno ){
                    header("Location:_tabela_aluno.php");
                    return false;
                }
                else{
                    $mysql_del = "DELETE FROM aluno WHERE id_aluno = '{$del_id}'";
                    $conec_del = $conn->query($mysql_del);
                    header("Location:_tabela_aluno.php");

                }
            }
    
        }
        else{
            header("Location:_tabela_aluno.php");
            return false;
        }   
    }
    else{
        header("Location:_tabela_aluno.php");
        return false;
    }




?>