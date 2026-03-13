<?php

$arquivo = "produtos.txt";
$resultados = array();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nome_busca = trim($_POST['nome']);

    if(file_exists($arquivo))
    {
        $linhas = file($arquivo);

        foreach($linhas as $linha)
        {
            $dados = explode("|", trim($linha));

            // Busca pelo nome do produto (não diferencia maiúscula/minúscula)
            if(stripos($dados[0], $nome_busca) !== false)
            {
                $resultados[] = $dados;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Busca_Produto</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<nav class="container-menu">
    <ul>
        <li><a href="index.php">INÍCIO</a></li>
        <li><a href="buscar.php">BUSCAR</a></li>
        <li><a href="listar.php">LISTAR</a></li>
        <li><a href="media.php">MEDIA</a></li>
        <li><a href="sair.php">SAIR</a></li>
    </ul>
</nav>

<div class="titulo"> <h2>Buscar Produto pelo Nome</h2><br></div>

<div class="container-formulario">
<form method="POST">

<label>Digite o Nome do Produto:</label><br>
<input type="text" name="nome" placeholder="Digite o nome do produto." required>

<br><br>

<button type="submit" class="btn-buscar">Buscar</button>
</form>

</div>
<br>

<?php

if(!empty($resultados))
{
    echo "<table border='1'>";
    echo "<tr>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Estoque</th>
            <th>Preço</th>
          </tr>";

    foreach($resultados as $produto)
    {
        echo "<tr>";
        echo "<td>".$produto[0]."</td>";
        echo "<td>".$produto[1]."</td>";
        echo "<td>".$produto[2]."</td>";
        echo "<td>".$produto[3]."</td>";
        echo "</tr>";
    }

    echo "</table>";
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo "<p class='mensagem'>Produto não encontrado.</p>";
}

?>

<footer class="footer-paginas">
Realizado por: Camila Macedo Mendes | Juliana Nascimento dos Santos
</footer>

</body>
</html>