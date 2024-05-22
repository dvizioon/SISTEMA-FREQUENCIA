<?php
    session_start();
    include_once('cofing.php');

    if(isset($_POST['submit_adm'])){

        if(isset($_POST['cpf_adm'])||isset($_POST['senha_adm'])||isset($_POST['select_op_adm'])){

            $val_cpf = $_POST['cpf_adm'];
            $val_key = $_POST['senha_adm'];
            $val_set = $_POST['select_op_adm'];

            if($val_cpf == ""){
                $_SESSION['not_cpf'] = true;
                unset($val_cpf);
                header("Location:_login_adm.php");
            }
            else if($val_key == ""){
                $_SESSION['not_key'] = true;
                unset($val_key);
                header("Location:_login_adm.php");
            }
            else if( $val_set == "setor"){
                $_SESSION['not_set'] = true;
                unset($val_set);
                header("Location:_login_adm.php");
            } 

            else{

                $cpf_Adm = mysqli_real_escape_string($conn,$_POST['cpf_adm']);
                $senha_Adm = mysqli_real_escape_string($conn,$_POST['senha_adm']);
                $op_setor_Adm = mysqli_real_escape_string($conn,$_POST['select_op_adm']);


                // print_r($cpf_Adm);
                // print_r($senha_Adm);
                // print_r($op_setor_Adm);


                $query = "select id_admin,Nome_adm,Cpf_adm,senha_adm,setor_adm,sesao_adm,Ativo from administrador where Cpf_adm = '{$cpf_Adm}' and senha_adm = '{$senha_Adm}' and setor_adm = '{$op_setor_Adm}'";
                
                $result = $conn->query($query);

                $row = mysqli_num_rows($result);

                // print_r($result);
                // print_r($row);

                // $data = mysqli_fetch_object($result);

                while($User_data = mysqli_fetch_object($result)){
                    $id_adm =  $User_data->id_admin;
                    $Nome =  $User_data->Nome_adm;
                    $sesao = $User_data->sesao_adm;
                    $Ativo =  $User_data->Ativo;
                }
                
                $Ativo = "Ativo";

                if($row == 1){
                    $_SESSION['id_admin']= $id_adm;
                    $_SESSION['Nome_adm']= $Nome;
                    $_SESSION['Cpf_adm']= $cpf_Adm ;
                    $_SESSION['senha_adm']= $senha_Adm; 
                    $_SESSION['sesao_adm']= $sesao; 
                    $_SESSION['setor_adm']= $op_setor_Adm;
                    $_SESSION['Ativo']= $Ativo;
                    $update = "UPDATE administrador SET Ativo = '{$Ativo}' WHERE Cpf_adm = '{$_SESSION['Cpf_adm']}'";
                    $result_up = mysqli_query($conn,$update);
                    header("Location:_painel_adm.php");
                    
                }
                else{
                    $_SESSION['not_user'] = true;
                    header("Location:_login_adm.php");
                    exit();
                }


            }

        }

    }



?>