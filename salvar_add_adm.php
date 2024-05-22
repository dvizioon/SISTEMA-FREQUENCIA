<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');
    
    $query = "select id_admin,Cpf_adm,sesao_adm,Ativo from administrador where Cpf_adm = '{$_SESSION['Cpf_adm']}' and id_admin = '{$_SESSION['id_admin']}'";
    $resul = $conn->query($query);


    if(isset($_POST['update_submit_adm'])){

        if(isset($_GET['adm'])){
            $id_adm = $_GET['adm'];
            $id_adm_edit = $_POST['id_adm_saved'];
            
            if($id_adm == ""){
                header("Location:_add_adm.php?adm={$id_adm_edit}");
                return false;
            }
            else{
                if(isset($_POST['name_adm'])){
                    
                    $name_adm = $_POST['name_adm'];
                    $_SESSION['name_proff'] = $name_adm; // sessão para destruir;
                    if($name_adm == ""){
                        $_SESSION['Not_name'] = true;
                        header("Location:_add_adm.php?adm={$id_adm_edit}");
                        return false;
                    }
                    
                }
                else{
                    header("Location:_add_adm.php?adm={$id_adm_edit}");
                    return false;
                }
                if(isset($_POST['cpf_adm'])){

                    $cpf_adm = $_POST['cpf_adm'];
                    $_SESSION['cpf_adm'] = $cpf_adm;
                    if($cpf_adm == ""){
                        $_SESSION['Not_cpf'] = true;
                        header("Location:_add_adm.php?adm={$id_adm_edit}");
                        return false;
                    }
                    
                }
                else{
                    header("Location:_add_adm.php?adm={$id_adm_edit}");
                    return false;
                }
                if(isset($_POST['senha_adm'])){

                    $senha_adm= $_POST['senha_adm'];
                    $_SESSION['senha_adm'] = $senha_adm;
                    if($senha_adm== ""){
                        $_SESSION['Not_cpf'] = true;
                        header("Location:_add_adm.php?adm={$id_adm_edit}");
                        return false;
                    }
                    
                }
                else{
                    header("Location:_add_adm.php?adm={$id_adm_edit}");
                    return false;
                }
                if(isset($_POST['op_setor'])){

                    $op_setor = $_POST['op_setor'];
                    $_SESSION['op_setor'] = $op_setor;

                    if($op_setor == ""){
                        $_SESSION['Not_turn'] = true;
                        header("Location:_add_adm.php?adm={$id_adm_edit}");
                        return false;
                    }

                }
                else{
                    header("Location:_add_adm.php?adm={$id_adm_edit}");
                    return false;
                }
                if(isset($_POST['id_adm_saved'])){

                    $id_adm_saved = $_POST['id_adm_saved'];
                    $_SESSION['id_adm_saved'] = $id_adm_saved;

                    // echo $id_proff_edit;
                    if($id_adm_edit == ""){
                        header("Location:_add_adm.php?adm={$id_adm_edit}");
                        return false;
                    }
                    else{

                        if($id_adm_edit !== $id_adm || $id_adm !== $id_adm_edit ){
                            header("Location:_add_adm.php?adm={$id_adm_edit}");
                            return false;
                        }
                        else{
                            if($op_setor == "none"){
                                $_SESSION['Not_turn'] = true;
                                header("Location:_add_adm.php?adm={$id_adm_edit}");
                                return false;
                            }
                            else{

                                $update_turn = mysqli_query($conn,"INSERT INTO administrador(Nome_adm,Cpf_adm,senha_adm,setor_adm) VALUES('$name_adm','$cpf_adm','$senha_adm','$op_setor')");
                                $_SESSION['sucess_adm'] = true;
                                header("Location:_add_adm.php?adm={$id_adm_edit}");
                                
                            }
                        }
                    }
                    
                }
                else{
                    header("Location:_add_adm.php?adm={$id_adm_edit}");
                    return false;
                }
                
            }
        }
        else{
            header("Location:_add_adm.php?adm={$id_adm_edit}");
            return false;
        }

    }
    else{
        header("Location:_add_adm.php?adm={$id_adm_edit}");
        return false;
    }
?>