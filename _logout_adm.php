<?php

    session_start();
    include_once('cofing.php');
    include('verificar_login_adm.php');

    // while($User_data = mysqli_fetch_object($resul)){
    //     $id_admin = $User_data->id_admin;
    // }

    

    if(empty($_GET['id'])){
        echo "Vazio";
    }
    else{
        
    
        $query = "select id_admin,Cpf_adm,sesao_adm from administrador where Cpf_adm = '{$_SESSION['Cpf_adm']}' and id_admin = '{$_SESSION['id_admin']}'";
        $resul = $conn->query($query);

        if(isset($_SESSION['id_admin'])){
           
            $id_admin = $_SESSION['id_admin'];
            $id_get = $_GET['id'];

                if($id_admin == "" || $id_get == ""){
                    header("Location:_painel_adm.php");
                }
                else{

                        if($id_get !== $id_admin){
                            header("Location:_painel_adm.php");
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

                            $update = "UPDATE administrador SET sesao_adm = '{$all}'";
                            $result_up = $conn->query($update);

                            $Ativo = "Inativo";
                            $update = "UPDATE administrador SET Ativo = '{$Ativo}' WHERE Cpf_adm = '{$_SESSION['Cpf_adm']}'";
                            $result_up = mysqli_query($conn,$update);

                            $_SESSION['yes_id'] = true;

                            header("Location:_login_adm.php");

                            unset($_SESSION['Cpf_adm']);
                            
                        }
                }
        }
        else{
            header("Location:_painel_adm.php");
            exit();
        }



    }


?>