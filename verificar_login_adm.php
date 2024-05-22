<?php

    include_once('cofing.php');

    if(!isset($_SESSION['Cpf_adm'])|| !isset($_SESSION['senha_adm'])){
        unset($_SESSION['Cpf_adm']);
        unset($_SESSION['senha_adm']);
        $Ativo = "Inativo";
        $update = "UPDATE administrador SET Ativo = '{$Ativo}' WHERE Cpf_adm = '{$_SESSION['Cpf_adm']}'";
        $result_up = mysqli_query($conn,$update);
        header("Location:_login_adm.php");
        exit();
    }


?>