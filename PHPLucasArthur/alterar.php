<!doctype HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Alterar Registros</title>
    <style type="text/css">

    h2 {
        text-align: center;
    }

    body {
        font-family: Verdana;
        font-size: 125%;
    }

    form {
        background: linear-gradient(to bottom,rgba(153, 153, 255, 0.8), rgba(255, 153, 255, 0.8), rgba(255, 255, 128, 0.8));
        width: 80%;
        border-radius: 10px;
        margin-left: 10%;
    }

    table {
        margin-left: 1%;
        border-radius: 2%;
    }

    table,tr,td,th {
        border: 2px solid rgb(10, 10, 10);
    }

    td,th {
        text-align: center;
    }

    p {
        background-color: rgb(150, 150, 150);
        text-align: center;
    }
    </style>

    <script language="JavaScript">
        function Saindo() {
            location.href = "index.html";
        }
    </script>

</head>
<body>
    <form id="form1" method="post" action="alterar.php">
    <?php  
echo "<h2>Alteração de Registros</h2>"; 
echo "<p>";  
echo "Código do registro a ser alterado&nbsp;";                 
echo "<input type='text' name='txtcod' id='txtcod'/><br/>";
echo "Nome&nbsp;";                 
echo "<input type='text' name='txtnome' id='txtnome'/>&nbsp;&nbsp;";
echo "Senha&nbsp;";                 
echo "<input type='password' name='txtsenha' id='txtsenha'/>&nbsp;&nbsp;";
echo "Sexo&nbsp;";                 
echo "<input type='radio' value='F' name='txtsexo' id='txtsexoF'/>F
<input type='radio' value='M' name='txtsexo' id='txtsexoM'/>M";
echo "<input type='submit' name='bt' id='bt' value='Consultar'/>&nbsp;&nbsp;"; 
echo "<input type='button' value='MENU' onClick='Saindo()'/>";
echo "</p>"; 

//estabelecendo a conexão com banco de dados 

include 'conexao.php';
$listar=$comando->query("select * from TBTesteIgor");
$total_registros =$listar->rowCount();

if ($total_registros > 0){
echo "<center>";
echo "<table style='border:2px solid rgb(0,0,0)'>";
echo "<tr style='border:2px solid rgb(0,0,0)'><th colspan=4 style='border:2px solid rgb(0,0,0);text-align:center'>Dados Cadastrados</th></tr>";
echo "<tr style='border:2px solid rgb(0,0,0)'>
<th style='border:2px solid rgb(0,0,0);text-align:center'>Código</th>
<th style='border:2px solid rgb(0,0,0);text-align:center'>Nome</th>
<th style='border:2px solid rgb(0,0,0);text-align:center'>Senha</th>
<th style='border:2px solid rgb(0,0,0);text-align:center'>Sexo</th>
</tr>";

while($linha=$listar->fetch(PDO::FETCH_ASSOC)){
$codigo=$linha['id'];
$nome=$linha['nome'];
$senha=$linha['senha'];
$sexo=$linha['sexo'];

echo "<tr style='border:2px solid rgb(0,0,0)'>
<td style='border:2px solid rgb(0,0,0);text-align:center'>$codigo</td>
<td style='border:2px solid rgb(0,0,0);text-align:center'>$nome</td>
<td style='border:2px solid rgb(0,0,0);text-align:center'>$senha</td>
<td style='border:2px solid rgb(0,0,0);text-align:center'>$sexo</td>
</tr>";
}
echo "</table>";
echo "</center>";
}

else{
echo "<script language=javascript> window.alert('Não existem registros para alterar!!!'); 'window.history.back()'</script>";
}
            
//recebendo os valores preenchidos nos campos do formulário nas variáveis do PHP
$vcod=$_POST['txtcod']; 
$vbt=$_POST['bt'];            

if ($vbt=='Consultar'){ 
//verificando se o código escolhido EXISTE                 
$pesq=$comando-> query("select * from TBTesteIgor where id='$vcod'");
$total_registros =$pesq->rowCount();

//achou o código escolhido, vamos devolver os dados para a tela
if ($total_registros > 0){
while($linha=$pesq->fetch(PDO::FETCH_ASSOC)){
$codigo=$linha['id'];
$nome=$linha['nome'];
$senha=$linha['senha'];
$sexo=$linha['sexo'];
echo "<script language=javascript>
document.getElementById('txtcod').value = $codigo;
document.getElementById('txtnome').value = $nome;
document.getElementById('txtsenha').value = $senha;

if ($sexo == 'F')
document.getElementById('txtsexoF').checked= true;

else
document.getElementById('txtsexoM').checked= true;
document.getElementById('bt').value= 'Consultar';
document.getElementById('txtcod').readOnly= true;
</script>";
}
}

 else {
 echo "<script language=javascript> window.alert('Código inexistente!!!'); </script>";
 echo "<meta http-equiv='refresh' content='0' />"; 
 window.alert('Registro alterado com sucesso!!! '); 
 }

if($vbt == 'Consultar'){ 

$vnome=$_POST['txtnome']; 
$vemail=$_POST['txtemail'];
$vsenha=$_POST['txtsenha'];
$vsexo=$_POST['txtsexo'];
//atualizando o registro com os novos valores 
$alter=$comando-> query("update TBTesteIgor set nome='$vnome', email='$vemail', senha='$vsenha', sexo='$vsexo' where id='$vcod'");
echo "<script language=javascript>
window.alert('Registro alterado com sucesso!!! '); 
document.getElementById('bt').value= 'Consultar';
document.getElementById('txtcod').readOnly= false;
</script>";
echo "<meta http-equiv='refresh'content='0' />"; 
window.alert('Registro alterado com sucesso!!! '); 
    }
}

?>
</form>
</body>
</html>000000000000000000000000