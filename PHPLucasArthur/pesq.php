
<?php
    include 'Conexao.php';
    $nome=$_POST['txtNome'];
    $pesq=$comando->query("select * from Tbteste where name_t like '%$nome%'");
    $total_reg =$pesq->rowCount();

    if ($total_reg > 0)

     {
            echo "<table style='margin-left:10%;width:80%;border:2px solid rgb(0,0,0)'>";
            echo "<tr style='border:2px solid rgb(0,0,0)'>
            <th colspan=5 style='border:2px solid rgb(0,0,0);text-align:center'>
                  Dados Cadastrados
            </th>

            </tr>";

            echo "<tr style='border:2px solid rgb(0,0,0)'>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Código</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Nome</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>E-mail</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Senha</th>
            <th style='border:2px solid rgb(0,0,0);text-align:center'>Sexo</th>
            
            </tr>";

            while($linha= $pesq->fetch(PDO::FETCH_ASSOC))
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
            echo "<br/><br/>";
            echo "<div style='text-align:center;'><button style='background-color:rgb(20,200,200);'><a href='pesq.html' style='text-decoration: none; color=rgb(0,0,0);'>Voltar</a></button></div>";

      }

      else

      {
      echo "<script language=javascript>
      window.alert('Não existem registros para exibir!!!'); 
      window.history.back(); 
      </script>";
      }
?>