<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_proff.php');

    // while($User_data = mysqli_fetch_object($resul)){
    //     $id_admin = $User_data->id_admin;
    // }

    

    if(empty($_GET['id'])){
        echo "Vazio";
    }
    else{
        
    
        $query = "select id_proff,Nome_proff,Cpf_proff,senha_proff,curso,sala,Turno,sessao from professor where Cpf_proff = '{$_SESSION['Cpf_proff']}' and senha_proff = '{$_SESSION['senha_proff']}' and id_proff = '{$_SESSION['id_proff']}'";

        $result = $conn->query($query);


        if(isset($_SESSION['id_proff'])){
           
            $id_admin = $_SESSION['id_proff'];
            $id_get = $_GET['id'];

                if($id_admin == "" || $id_get == ""){
                    header("Location:_painel_proff.php");
                }
                else{

                        if($id_get !== $id_admin){
                            header("Location:_painel_proff.php");
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

                            $updater = "UPDATE professor SET sessao = '{$all}'";
                            $result_up = $conn->query($updater);

                            $Ativo = "Inativo";
                            $update = "UPDATE professor SET Ativo_proff = '{$Ativo}' WHERE Cpf_proff = '{$_SESSION['Cpf_proff']}'";
                            $result_up = mysqli_query($conn,$update);

                            $_SESSION['yes_id'] = true;

                            header("Location:_loogin_proff.php");

                            unset($_SESSION['Cpf_proff']);
                            
                        }
                }
        }
        else{
            header("Location:_painel_proff.php");
            exit();
        }



    }


?>