<?php
    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');

    $mysql_query = "SELECT * FROM professor WHERE id_proff='{$_GET['prof']}'";
    $mysql_resul = $conn->query($mysql_query);
    

    $row = mysqli_num_rows($mysql_resul);

    if($row == "1"){
        if(isset($_GET['prof'])){

            if(!empty($_GET['prof'])){

                while($user = mysqli_fetch_object($mysql_resul)){
                    $id_proff = $user->id_proff;
                }

                $del_id = $_GET['prof'];
    
                if($del_id !== $id_proff ){
                    header("Location:_tabela_professor.php");
                    return false;
                }
                else{
                    $mysql_del = "DELETE FROM professor WHERE id_proff = '{$del_id}'";
                    $conec_del = $conn->query($mysql_del);
                    header("Location:_tabela_professor.php");

                }
            }
    
        }
        else{
            header("Location:_tabela_professor.php");
            return false;
        }   
    }
    else{
        header("Location:_tabela_professor.php");
        return false;
    }




?>