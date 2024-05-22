<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_aluno.php');

    // while($User_data = mysqli_fetch_object($resul)){
    //     $id_admin = $User_data->id_admin;
    // }

    

    if(empty($_GET['id'])){
        header("Location:_painel_aluno.php");
    }
    else{
        
    
        $query = "select id_aluno,Nome_aluno,Cpf_aluno,senha_aluno,curso,sala,Turno,sessao_aluno from aluno where Cpf_aluno = '{$_SESSION['Cpf_aluno']}' and senha_aluno = '{$_SESSION['senha_aluno']}' and id_aluno = '{$_SESSION['id_aluno']}'";

        $result = $conn->query($query);


        if(isset($_SESSION['id_aluno'])){
           
            $id_admin = $_SESSION['id_aluno'];
            $id_get = $_GET['id'];

                if($id_admin == "" || $id_get == ""){
                    header("Location:_painel_aluno.php");
                }
                else{

                        if($id_get !== $id_admin){
                            header("Location:_painel_aluno.php");
                            exit();
                        }
                        else{
                            
                            date_default_timezone_set('America/Sao_Paulo');
                            // $data = date('d/m/Y\T\H:i');
                            $d = date('d');
                            $m = date('m');
                            $y = date('Y');
                            $h = date('H');
                            $i = date('i');

                            $all = $d."-".$m."-".$y." ".$h.":".$i;

                            $update = "UPDATE aluno SET sessao_aluno = '{$all}'";
                            $result_up = $conn->query($update);

                            $Ativo = "Inativo";
                            $update = "UPDATE aluno SET Ativo_aluno = '{$Ativo}' WHERE Cpf_aluno = '{$_SESSION['Cpf_aluno']}'";
                            $result_up = mysqli_query($conn,$update);

                            $_SESSION['yes_id'] = true;

                            header("Location:_login_aluno.php");

                            unset($_SESSION['Cpf_aluno']);
                            // session_destroy();                            
                        }
                }
        }
        else{
            header("Location:_painel_aluno.php");
            exit();
        }



    }


?>