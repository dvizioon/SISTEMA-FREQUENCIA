<?php
    session_start();
    include_once('cofing.php');

    if(isset($_POST['submit_proff'])){

        if(isset($_POST['cpf_proff'])||isset($_POST['senha_proff'])||isset($_POST['select_op_proff'])){

            $val_cpf = $_POST['cpf_proff'];
            $val_key = $_POST['senha_proff'];
            $val_set = $_POST['select_op_proff'];

            if($val_cpf == ""){
                $_SESSION['not_cpf'] = true;
                unset($val_cpf);
                header("Location:_loogin_proff.php");
            }
            else if($val_key == ""){
                $_SESSION['not_key'] = true;
                unset($val_key);
                header("Location:_loogin_proff.php");
            }
            else if( $val_set == "setor"){
                $_SESSION['not_set'] = true;
                unset($val_set);
                header("Location:_loogin_proff.php");
            } 

            else{

                $cpf_proff = mysqli_real_escape_string($conn,$_POST['cpf_proff']);
                $senha_proff = mysqli_real_escape_string($conn,$_POST['senha_proff']);
                $op_setor_proff = mysqli_real_escape_string($conn,$_POST['select_op_proff']);


                // print_r($cpf_Adm);
                // print_r($senha_Adm);
                // print_r($op_setor_Adm);


                $query = "select id_proff,Nome_proff,Cpf_proff,senha_proff,curso,sala,Turno,sessao,Ativo_proff from professor where Cpf_proff = '{$cpf_proff}' and senha_proff = '{$senha_proff}' and curso = '{$op_setor_proff}'";
                
                $result = $conn->query($query);

                $row = mysqli_num_rows($result);

                // print_r($result);
                // print_r($row);

                // $data = mysqli_fetch_object($result);

                while($User_data = mysqli_fetch_object($result)){
                    $id_proff=  $User_data->id_proff;
                    $Nome =  $User_data->Nome_proff;
                    $sala_proff = $User_data->sala;
                    $Turno =  $User_data->Turno;
                    $sessao = $User_data->sessao;
                }
                
                $Ativo = "Ativo";

                if($row == 1){
                    $_SESSION['id_proff']= $id_proff;
                    $_SESSION['Nome_proff']= $Nome;
                    $_SESSION['Cpf_proff']= $cpf_proff ;
                    $_SESSION['senha_proff']= $senha_proff; 
                    $_SESSION['curso']= $curso_proff; 
                    $_SESSION['sala']= $op_setor_proff;
                    $_SESSION['Turno']= $Turno;
                    $_SESSION['sessao']= $sessao;
                    $_SESSION['Ativo_proff']= $Ativo;
                    $update = "UPDATE professor SET Ativo_proff = '{$Ativo}' WHERE Cpf_proff = '{$_SESSION['Cpf_proff']}'";
                    $result_up = mysqli_query($conn,$update);
                    header("Location:_painel_proff.php");
                    
                }
                else{
                    $_SESSION['not_user'] = true;
                    header("Location:_loogin_proff.php");
                    exit();
                }


            }

        }

    }



?>