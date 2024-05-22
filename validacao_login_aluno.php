<?php
    session_start();
    include_once('cofing.php');
    

    if(isset($_POST['submit_aluno'])){

        if(isset($_POST['cpf_aluno'])||isset($_POST['senha_aluno'])||isset($_POST['select_op_aluno'])){

            $val_cpf = $_POST['cpf_aluno'];
            $val_key = $_POST['senha_aluno'];
            $val_set = $_POST['select_op_aluno'];

            if($val_cpf == ""){
                $_SESSION['not_cpf'] = true;
                unset($val_cpf);
                header("Location:_login_aluno.php");
            }
            else if($val_key == ""){
                $_SESSION['not_key'] = true;
                unset($val_key);
                header("Location:_login_aluno.php");
            }
            else if( $val_set == "setor"){
                $_SESSION['not_set'] = true;
                unset($val_set);
                header("Location:_login_aluno.php");
            } 

            else{

                $cpf_aluno = mysqli_real_escape_string($conn,$_POST['cpf_aluno']);
                $senha_aluno = mysqli_real_escape_string($conn,$_POST['senha_aluno']);
                $op_setor_aluno = mysqli_real_escape_string($conn,$_POST['select_op_aluno']);


                // print_r($cpf_Adm);
                // print_r($senha_Adm);
                // print_r($op_setor_Adm);


                $query = "select id_aluno,Nome_aluno,Cpf_aluno,senha_aluno,curso,sessao_aluno,Ativo_aluno,sala,Turno from aluno where Cpf_aluno = '{$cpf_aluno}' and senha_aluno = '{$senha_aluno}' and curso = '{$op_setor_aluno}'";
                
                $result = $conn->query($query);

                $row = mysqli_num_rows($result);

                // print_r($result);
                // print_r($row);

                // $data = mysqli_fetch_object($result);

                while($User_data = mysqli_fetch_object($result)){
                    $id_aluno =  $User_data->id_aluno;
                    $Nome_aluno =  $User_data->Nome_aluno;
                    $sesao_aluno = $User_data->sessao_aluno;
                    $Ativo_aluno =  $User_data->Ativo_aluno;
                }
                
                $Ativo = "Ativo";

                if($row == 1){
                    $_SESSION['id_aluno']= $id_aluno;
                    $_SESSION['Nome_aluno']= $Nome_aluno;
                    $_SESSION['Cpf_aluno']= $cpf_aluno ;
                    $_SESSION['senha_aluno']= $senha_aluno; 
                    $_SESSION['sessao_aluno']= $sesao_aluno; 
                    $_SESSION['curso']= $op_setor_Adm;
                    $_SESSION['Ativo_aluno']= $Ativo_aluno;
                    $update = "UPDATE aluno SET Ativo_aluno = '{$Ativo}' WHERE Cpf_aluno = '{$_SESSION['Cpf_aluno']}'";
                    $result_up = mysqli_query($conn,$update);
                    header("Location:_painel_aluno.php");
                    
                }
                else{
                    $_SESSION['not_user'] = true;
                    header("Location:_login_aluno.php");
                    exit();
                }


            }

        }

    }



?>