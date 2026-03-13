<?php
$arquivo = "produtos.txt";
$somaProdutos = 0;
$totalProdutos = 0;

if(file_exists($arquivo))
{
    $linhas = file($arquivo);

    foreach($linhas as $linha)
    {
        $dados = explode("|", trim($linha));

        $produto = $dados[2]; // posição do valor do produto: nome, idade, nota
        $somaProdutos += $produto;
        $totalProdutos++;
    }
    if($totalProdutos > 0)
    {
        $media = $somaProdutos/$totalProdutos;
    }
    else
    {
        $media = 0;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Média_Produtos</title>
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
<div class="titulo"> <h2>Média dos Produtos em Estoque</h2><br></div>

<?php if($totalProdutos > 0) { ?>

<table class="tabela-media">
    <tr>
        <th>Total de Produtos</th>
        <th>Média dos Produtos em Estoque</th>
    </tr>
    <tr>
        <td><?php echo $totalProdutos; ?></td>
        <td><?php echo number_format($media, 2); ?></td>
    </tr>
</table>

<?php }
 else {
?>
<p class="mensagem">Nenhum produto está cadastrado no sistema.</p>

<?php } ?>

<footer class="footer-paginas">
Realizado por: Camila Macedo Mendes | Juliana Nascimento dos Santos
</footer>


</body>
</html>