<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');


    if(isset($_POST['update_submit_proff'])){

        if(isset($_GET['prof'])){
            $id_proff = $_GET['prof'];
            $id_proff_edit = $_POST['id_proff_edit'];
            
            if($id_proff == ""){
                        header("Location:_edit_proff.php?prof={$id_proff_edit}");
                        return false;
            }
            else{
                if(isset($_POST['name_proff'])){
                    
                    $name_proff = $_POST['name_proff'];
                    $_SESSION['name_proff'] = $name_proff; // sessão para destruir;
                    if($name_proff == ""){
                        $_SESSION['Not_name'] = true;
                         header("Location:_edit_proff.php?prof={$id_proff_edit}");
                         return false;
                    }
                    
                }
                else{
                    header("Location:_edit_proff.php?prof={$id_proff_edit}");
                    return false;
                }
                if(isset($_POST['cpf_proff'])){

                    $cpf_proff = $_POST['cpf_proff'];
                    $_SESSION['cpf_proff'] = $cpf_proff;
                    if($cpf_proff == ""){
                        $_SESSION['Not_cpf'] = true;
                         header("Location:_edit_proff.php?prof={$id_proff_edit}");
                         return false;
                    }
                    
                }
                else{
                    header("Location:_edit_proff.php?prof={$id_proff_edit}");
                    return false;
                }
                if(isset($_POST['op_curso'])){

                    $op_curso = $_POST['op_curso'];
                    $_SESSION['op_curso'] = $op_curso;
                    if($op_curso == ""){

                        $_SESSION['Not_curso'] = true;
                         header("Location:_edit_proff.php?prof={$id_proff_edit}");
                         return false;
                        
                    }
                    else{
                        if($op_curso == "none"){
                             $_SESSION['Not_curso'] = true;
                            header("Location:_edit_proff.php?prof={$id_proff_edit}");
                            return false;
                        }
                       
                    }

                }
                else{
                        header("Location:_edit_proff.php?prof={$id_proff_edit}");
                        return false;
                }
                if(isset($_POST['sala_proff'])){

                    $sala_proff = $_POST['sala_proff'];
                    $_SESSION['sala_proff'] = $sala_proff;
                    if($sala_proff == ""){
                        $_SESSION['Not_sala'] = true;
                        header("Location:_edit_proff.php?prof={$id_proff_edit}");
                        return false;
                    }

                }
                else{
                    header("Location:_edit_proff.php?prof={$id_proff_edit}");
                    return false;
                }
                if(isset($_POST['op_turno'])){

                    $op_turno = $_POST['op_turno'];
                    $_SESSION['op_turno'] = $op_turno;

                    if($op_turno == ""){
                        $_SESSION['Not_turn'] = true;
                        unset($_SESSION['op_turno']);
                        header("Location:_edit_proff.php?prof={$id_proff_edit}");
                        return false;
                    }

                }
                else{
                    header("Location:_edit_proff.php?prof={$id_proff_edit}");
                    return false;
                }
                if(isset($_POST['id_proff_edit'])){

                    $id_proff_edit = $_POST['id_proff_edit'];
                    $_SESSION['id_proff_edit'] = $id_proff_edit;

                    // echo $id_proff_edit;
                    if($id_proff_edit == ""){
                        header("Location:_edit_proff.php?prof={$id_proff_edit}");
                        return false;
                    }
                    else{

                        if($id_proff_edit !== $id_proff || $id_proff !== $id_proff_edit ){
                            header("Location:_edit_proff.php?prof={$id_proff_edit}");
                            return false;
                        }
                        else{
                            if($op_turno == "none"){
                                $_SESSION['Not_turn'] = true;
                                header("Location:_edit_proff.php?prof={$id_proff_edit}");
                                return false;
                            }
                            else if($op_turno == "Matutino"){

                                $update_turn = "UPDATE professor SET Nome_proff = '{$name_proff}' , Cpf_proff = '{$cpf_proff}' , curso ='{$op_curso}', sala = '{$sala_proff}',Turno = '{$op_turno}' WHERE id_proff = '{$id_proff_edit}'";
                                $result_turn = $conn->query($update_turn);
                                $_SESSION['sucess_adm'] = true;
                                header("Location:_edit_proff.php?prof={$id_proff_edit}");
                                return false;
                                
                            }
                            else if($op_turno =="Vespertino"){

                                $update_turn = "UPDATE professor SET Nome_proff = '{$name_proff}' , Cpf_proff = '{$cpf_proff}' , curso ='{$op_curso}', sala = '{$sala_proff}',Turno = '{$op_turno}' WHERE id_proff = '{$id_proff_edit}'";
                                $result_turn = $conn->query($update_turn);
                                $_SESSION['sucess_adm'] = true;
                                header("Location:_edit_proff.php?prof={$id_proff_edit}");
                                return false;
                                
                            }
                            else{
                                 $update_turn = "UPDATE professor SET Nome_proff = '{$name_proff}' , Cpf_proff = '{$cpf_proff}' , curso ='{$op_curso}', sala = '{$sala_proff}',Turno = '{$op_turno}' WHERE id_proff = '{$id_proff_edit}'";
                                 $result_turn = $conn->query($update_turn);
                                 $_SESSION['sucess_adm'] = true;
                                 header("Location:_edit_proff.php?prof={$id_proff_edit}");
                                 return false;
                            }
                        }
                    }
                    
                }
                else{
                    header("Location:_edit_proff.php?prof={$id_proff_edit}");
                    return false;
                }
                
            }
        }
        else{
            header("Location:_edit_proff.php?prof={$id_proff_edit}");
            return false;
        }

    }
    else{
        header("Location:_edit_proff.php?prof={$id_proff_edit}");
        return false;
    }
?>