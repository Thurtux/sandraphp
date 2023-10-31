<?php
    include 'Conexao.php';
    $nome=$_POST["txtNome"];
    $email=$_POST["txtEmail"];
    $senha=$_POST["txtSenha"];
    $sexo=$_POST["txtSexo"];
    $data=$_POST["dtData"];
    $insert=$comando->query("insert into Tbteste(name_t,email_t,senha_t,sexo_t,data_t)values('$nome','$email','$senha','$sexo','$data')");
    
    echo "<script language='JavaScript'>
    alert('Dados cadastrados com sucesso!!! ');
    location.href='cada.html';
    </script>";
?>