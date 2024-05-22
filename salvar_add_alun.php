
<?php

session_start();
include_once('cofing.php');
include('verificar_login_adm.php');


if(isset($_POST['submit_alun'])){

    if(isset($_GET['alun'])){
        $id_alun = $_GET['alun'];
        $id_alun_edit = $_POST['id_alun_saved'];
        
        if($id_alun == ""){
            header("Location:_add_alun.php?alun={$id_alun_edit}");
            return false;
        }
        else{
            if(isset($_POST['name_alun'])){
                
                $name_alun = $_POST['name_alun'];
                $_SESSION['name_alun'] = $name_alun; // sessão para destruir;
                if($name_alun == ""){
                    $_SESSION['Not_name'] = true;
                    header("Location:_add_alun.php?alun={$id_alun_edit}");
                    return false;
                }
                
            }
            else{
                header("Location:_add_alun.php?alun={$id_alun_edit}");
                return false;
            }
            if(isset($_POST['cpf_alun'])){

                $cpf_alun = $_POST['cpf_alun'];
                $_SESSION['cpf_alun'] = $cpf_alun;
                if($cpf_alun == ""){
                    $_SESSION['Not_cpf'] = true;
                    header("Location:_add_alun.php?alun={$id_alun_edit}");
                    return false;
                }
                
            }
            else{
                header("Location:_add_alun.php?alun={$id_alun_edit}");
                return false;
            }
            if(isset($_POST['senha_alun'])){

                $senha_alun = $_POST['senha_alun'];
                $_SESSION['senha_alun'] = $senha_alun;
                if($senha_alun == ""){
                    $_SESSION['Not_cpf'] = true;
                    header("Location:_add_alun.php?alun={$id_alun_edit}");
                    return false;
                }
                
            }
            else{
                header("Location:_add_alun.php?alun={$id_alun_edit}");
                return false;
            }
            if(isset($_POST['sala_alun'])){

                $sala_alun = $_POST['sala_alun'];
                $_SESSION['sala_alun'] = $sala_alun;
                if($sala_alun == ""){
                    $_SESSION['Not_sala'] = true;
                    header("Location:_add_alun.php?alun={$id_alun_edit}");
                    return false;
                }

            }
            else{
                header("Location:_add_alun.php?alun={$id_alun_edit}");
                return false;
            }
            if(isset($_POST['op_turno'])){

                $op_turno = $_POST['op_turno'];
                $_SESSION['op_turno'] = $op_turno;

                if($op_turno == ""){
                    $_SESSION['Not_turn'] = true;
                    header("Location:_add_alun.php?alun={$id_alun_edit}");
                    return false;
                }

            }
            else{
                header("Location:_add_prof.php?prof={$id_proff_edit}");
                return false;
            }
            if(isset($_POST['op_curso'])){

                $op_curso = $_POST['op_curso'];
                $_SESSION['op_curso'] = $op_curso;

                if($op_curso == "none"){
                    $_SESSION['Not_turn'] = true;
                    header("Location:_add_alun.php?alun={$id_alun_edit}");
                    return false;
                }
                

            }
            else{
                header("Location:_add_alun.php?alun={$id_alun_edit}");
                return false;
            }
            if(isset($_POST['id_alun_saved'])){

                $id_alun_edit = $_POST['id_alun_saved'];
                $_SESSION['id_alun_saved'] = $id_alun_edit;

                // echo $id_proff_edit;
                if($id_alun_edit == ""){
                    header("Location:_add_alun.php?alun={$id_alun_edit}");
                    return false;
                }
                else{

                    if($id_alun_edit !== $id_alun || $id_alun !== $id_alun_edit ){
                        header("Location:_add_alun.php?alun={$id_alun_edit}");
                        return false;
                        
                    }
                    else{
                        
                        if($op_turno == "none"){
                            $_SESSION['Not_turn'] = true;
                            header("Location:_add_alun.php?alun={$id_alun_edit}");
                            return false;
                        }
                        else if($op_turno == "Matutino"){
                             
                                date_default_timezone_set('America/Sao_Paulo');
                                // $data = date('d/m/Y\T\H:i');
                                $d = date('d');
                                $m = date('m');
                                $y = date('Y');
                                $h = date('H');
                                $i = date('i');

                                $all = $d."-".$m."-".$y;
                                $hor = $h.":".$i;


                            $update_turn = mysqli_query($conn, "INSERT INTO aluno(Nome_aluno,Cpf_aluno,Ativo_aluno,senha_aluno,curso,sala,Turno,sessao_aluno) VALUES('$name_alun','$cpf_alun','Inativo','$senha_alun','$op_curso','$sala_alun','$op_turno',CURRENT_TIMESTAMP())");
                            // $update_mysql = mysqli_query($conn,"INSERT INTO frequencia(Nome_aluno,Cpf_aluno,curso,datafr,hora,sala,Turno) VALUES('$name_alun','$cpf_alun','$op_curso','$all','$hor','$sala_alun','$op_turno')");
                            $_SESSION['sucess_adm'] = true;
                            clearstatcache();
                            header("Location:_add_alun.php?alun={$id_alun_edit}");
                            return false;
                            
                        }
                        else if($op_turno =="Vespertino"){

                            date_default_timezone_set('America/Sao_Paulo');
                            // $data = date('d/m/Y\T\H:i');
                            $d = date('d');
                            $m = date('m');
                            $y = date('Y');
                            $h = date('H');
                            $i = date('i');

                            $all = $d."-".$m."-".$y;
                            $hor = $h.":".$i;


                            $update_turn = mysqli_query($conn, "INSERT INTO aluno(Nome_aluno,Cpf_aluno,Ativo_aluno,senha_aluno,curso,sala,Turno,sessao_aluno) VALUES('$name_alun','$cpf_alun','Inativo','$senha_alun','$op_curso','$sala_alun','$op_turno',CURRENT_TIMESTAMP())");
                            // $update_mysql = mysqli_query($conn,"INSERT INTO frequencia(Nome_aluno,Cpf_aluno,curso,datafr,hora,sala,Turno) VALUES('$name_alun','$cpf_alun','$op_curso','$all','$hor','$sala_alun','$op_turno')");
                            $_SESSION['sucess_adm'] = true;
                            clearstatcache();
                            header("Location:_add_alun.php?alun={$id_alun_edit}");
                            return false;
                            
                        }
                        else{
                            date_default_timezone_set('America/Sao_Paulo');
                            // $data = date('d/m/Y\T\H:i');
                            $d = date('d');
                            $m = date('m');
                            $y = date('Y');
                            $h = date('H');
                            $i = date('i');

                            $all = $d."-".$m."-".$y;
                            $hor = $h.":".$i;

                            $update_turn = mysqli_query($conn, "INSERT INTO aluno(Nome_aluno,Cpf_aluno,Ativo_aluno,senha_aluno,curso,sala,Turno,sessao_aluno) VALUES('$name_alun','$cpf_alun','Inativo','$senha_alun','$op_curso','$sala_alun','$op_turno',CURRENT_TIMESTAMP())");
                            // $update_mysql = mysqli_query($conn,"INSERT INTO frequencia(Nome_aluno,Cpf_aluno,curso,datafr,hora,sala,Turno) VALUES('$name_alun','$cpf_alun','$op_curso','$all','$hor','$sala_alun','$op_turno')");
                            $_SESSION['sucess_adm'] = true;
                            clearstatcache();
                            header("Location:_add_alun.php?alun={$id_alun_edit}");
                            return false;
                        }
                    }
                }
                
            }
            else{
                header("Location:_add_alun.php?alun={$id_alun_edit}");
                return false;
            }
            
        }
    }
    else{
        header("Location:_add_alun.php?alun={$id_alun_edit}");
        return false;
    }

}
else{
    header("Location:_add_alun.php?alun={$id_alun_edit}");
    return false;
}
?>
