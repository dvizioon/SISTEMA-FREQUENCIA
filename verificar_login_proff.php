<?php

    include_once('cofing.php');

    if(!isset($_SESSION['Cpf_proff'])|| !isset($_SESSION['senha_proff'])){
        unset($_SESSION['Cpf_proff']);
        unset($_SESSION['senha_proff']);
        $Ativo = "Inativo";
        $update = "UPDATE professor SET Ativo_proff = '{$Ativo}' WHERE Cpf_proff = '{$_SESSION['Cpf_adm']}'";
        $result_up = mysqli_query($conn,$update);
        header("Location:_loogin_proff.php");
        exit();
    }


?>