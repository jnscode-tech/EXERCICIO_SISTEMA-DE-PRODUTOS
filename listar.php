<?php
$arquivo = "alunos.txt";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Lista de Alunos</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<nav class="container-menu">
<ul>
    <li><a href="cadastrar.php">CADASTRAR</a></li>
    <li><a href="buscar.php">BUSCAR</a></li>
    <li><a href="listar.php">LISTAR</a></li>
    <li><a href="media.php">MEDIA</a></li>
    <li><a href="sair.php">SAIR</a></li>
    
</ul>
</nav>
</div>



<h2>Lista de Alunos Cadastrados</h2>

<?php

if(file_exists($arquivo))
{
    $linhas = file($arquivo);

    if(count($linhas) > 0)
    {

        echo "<table>";
        echo "<tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Curso</th>
                <th>Nota</th>
              </tr>";

        foreach($linhas as $linha)
        {
            $dados = explode("|", trim($linha));

            echo "<tr>";
            echo "<td>".$dados[0]."</td>";
            echo "<td>".$dados[1]."</td>";
            echo "<td>".$dados[2]."</td>";
            echo "<td>".$dados[3]."</td>";
            echo "</tr>";
        }

        echo "</table>";

    }
    else
    {
        echo "<p class='mensagem'>Nenhum aluno cadastrado.</p>";
    }
}
else
{
    echo "<p class='mensagem'>Arquivo não encontrado.</p>";    
}

?>


<footer class="footer-paginas">
Realizado por: Camila Macedo Mendes | Juliana Nascimento dos Santos
</footer>

</body>
</html>