<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');


    if(isset($_POST['update_submit'])){

            if(isset($_POST['id_user_edit'])){
                $id_user_edit= $_POST['id_user_edit'];
                $_SESSION['id_user_edit'] = $id_user_edit; // sessão para destruir;

                $id_session_edit = $_SESSION['id_admin'];

                     if($id_session_edit !== $id_session_edit){
                        return false;
                     }


            }
        
            if(isset($_POST['edit_name'])){
                // print_r($_POST['edit_name']);
                $edit_name = $_POST['edit_name'];
                $_SESSION['edit_name'] = $edit_name; // sessão para destruir;

                    if($edit_name == ""){
                        $_SESSION['Not_name'] = true;
                         header("Location:ficha_principal_adm.php?adm={$id_user_edit}");
                         return false;
                    }
            }
            else{
                        
            }

            if(isset($_POST['edit_cpf'])){
                // print_r($_POST['edit_cpf']);
                $edit_cpf = $_POST['edit_cpf'];
                $_SESSION['edit_cpf'] = $edit_cpf; // sessão para destruir;

                if($edit_cpf == ""){
                    $_SESSION['Not_cpf'] = true;
                    header("Location:ficha_principal_adm.php?adm={$id_user_edit}");
                    return false;
                }
            }
            else{

            }
            if(isset($_POST['edit_administracao'])){
                // print_r($_POST['edit_administracao']);
                $edit_adm = $_POST['edit_administracao'];
                $_SESSION['edit_administracao'] = $edit_adm; // sessão para destruir;

                    if($edit_adm == ""){
                        return false;
                        
                    }
                    else{

                        if($edit_adm == "not_setor"){
                            $_SESSION['Not_setor'] = true;
                            header("Location:ficha_principal_adm.php?adm={$id_user_edit}");
                               
                        }
                        else{
                                $update_adm = "UPDATE administrador SET Nome_adm = '{$edit_name}' , Cpf_adm = '{$edit_cpf}' , setor_adm = '{$edit_adm}' WHERE id_admin = '{$id_session_edit}'";
                                $update_res = mysqli_query($conn,$update_adm);
                                $_SESSION['sucess_adm'] = true;
                                header("Location:ficha_principal_adm.php?adm={$id_user_edit}");
            
                                
                        }

                    }
            }
            else{

            }



    }
    else{
        
    }








?>