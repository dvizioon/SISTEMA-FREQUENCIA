<?php

    include_once('cofing.php');

    if(!isset($_SESSION['Cpf_aluno'])|| !isset($_SESSION['senha_aluno'])){
        unset($_SESSION['Cpf_aluno']);
        unset($_SESSION['senha_aluno']);
        $Ativo = "Inativo";
        $update = "UPDATE aluno SET Ativo_aluno = '{$Ativo}' WHERE Cpf_aluno = '{$_SESSION['Cpf_aluno']}'";
        $result_up = mysqli_query($conn,$update);
        header("Location:_login_aluno.php");
        exit();
    }
    else{
        
    }


?>