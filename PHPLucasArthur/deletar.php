<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Registros</title>
</head>


<head>

    <meta charset="utf-8" />

    <title>Deletar Registros</title>

    <style type="text/css">
        h2 {

            text-align: center;

        }

        body {

            font-family: Verdana;

            font-size: 125%;

        }

        form {
            /*background: linear-gradient(to bottom,
                    rgba(153, 153, 255, 0.8), rgba(255, 153, 255, 0.8), rgba(255, 255, 128, 0.8));*/
            width: 80%;
            border-radius: 10%;
            margin-left: 10%;
        }

        table {
            margin-left: 1%;
            border-radius: 2%;
        }

        table,
        tr,
        td,
        th {
            border: 2px solid rgb(10, 10, 10);
        }

        td,
        th {
            text-align: center;
        }

        p {
           /* background-color: rgb(150, 150, 150);*/
            text-align: center;
        }

        
        #btn{
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

    <form id="form1" method="post" action="deletar.php">
        <?php

        echo "<h2>Exclusão de Registros</h2>";
        echo "<p>";
        echo "Código do registro a ser apagado&nbsp;";
        echo "<input type='text' name='txtcod' id='txtcod'/>&nbsp;&nbsp;";
        echo "<div id='btn'>
              <input type='submit' value='Confirmar' id='btnconf' name='btconf'/>
              <input type='reset' value='Limpar' id='btnReset'/>
              <input type='button' value='Menu' onClick='Saindo()'/>
             </div>";
        //estabelecendo a conexão com banco de dados
        include 'Conexao.php';
        $lista = $comando->query("select * from Tbteste");

        $total_registros = $lista->rowCount();

        if ($total_registros > 0) //1º if //monta a lista geral para escolha do código
        {

            echo "<table style='margin-left:10%;width:80%;border:2px solid rgb(0,0,0)'>";
            echo "<tr style='border:2px solid rgb(0,0,0)'>
                <th colspan=5 style='border:2px solid rgb(0,0,0);text-align:center'>Dados Cadastrados</th>
                </tr>";
            echo "<tr style='border:2px solid rgb(0,0,0)'>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Código</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Nome</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>E-mail</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Senha</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Sexo</th>
            </tr>";

            while ($linha = $lista->fetch(PDO::FETCH_ASSOC)) 
            {
                $vcodi=$linha['codi_t'];
                $vnom=$linha['name_t'];
                $vemai=$linha['email_t'];
                $vsenh=$linha['senha_t'];
                $vsexo=$linha['sexo_t'];
                echo "<tr style='border:2px solid rgb(0,0,0)'>
                <td style='border:2px solid rgb(0,0,0);text-align:center'>$vcodi</td>
                <td style='border:2px solid rgb(0,0,0);text-align:center'>$vnom</td>
                <td style='border:2px solid rgb(0,0,0);text-align:center'>$vemai</td>
                <td style='border:2px solid rgb(0,0,0);text-align:center'>$vsenh</td>
                <td style='border:2px solid rgb(0,0,0);text-align:center'>$vsexo</td>
                </tr>";
            }
            echo "</table>";


            //recebendo os valores preenchidos nos campos do formulário nas variáveis do PHP
            $vcodi=isset($_POST['txtcod']);
            $btcon=isset($_POST['btconf']);
            //”name” do botão confirma = btconf

           
            if (isset($_POST['txtcod']))

            { //se na caixa de texto do código escolhido estiver diferente de vazio executa o bloco abaixo
        
                $vcodi=$_POST['txtcod'];
                             
                //verificando se o código escolhido EXISTE na tabela 
                $pesq = $comando->query("select * from Tbteste where codi_t='$vcodi'");
                $total_registros = $pesq->rowCount();

                if ($total_registros > 0) {
                    //vamos apagar o registro escolhido
                    $excl = $comando->query("delete from Tbteste where codi_t='$vcodi'");
                    echo "<script language=javascript>
                window.alert('Registro excluído com sucesso!!! ');
                </script>";
                    // efetuando um refresh na tela depois da exclusão
                    echo "<meta http-equiv='refresh' content='0' />";
                } else {
                    //o usuário escolheu um código que não foi apresentado na listagem
                    echo "<script language=javascript> 
                window.alert('Registro inexistente!!! ');
                </script>";
                }

            } else {
                //o usuário deixou a caixa de texto em branco e clicou no botão “confirma”
                echo "<script language=javascript>
            window.alert('Escolha um código da lista!!! ');
            document.getElementById('txtcod').focus(); 
            </script>";
            }
        } else // do 1º if
        {
        echo "<script language=javascript> 
        window.alert('Não existem registros para excluir!!!');";
        echo "<meta http-equiv='refresh' content='0' />";
        }


        ?>
    </form>
    
   
</body>


</html>