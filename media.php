<?php
$arquivo = "alunos.txt";
$somaNotas = 0;
$totalAlunos = 0;

if(file_exists($arquivo))
{
    $linhas = file($arquivo);

    foreach($linhas as $linha)
    {
        $dados = explode("|", trim($linha));

        $nota = $dados[3]; // posição da nota no cadastro: nome, idade, nota
        $somaNotas += $nota;
        $totalAlunos++;
    }
    if($totalAlunos > 0)
    {
        $media = $somaNotas / $totalAlunos;
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
<title>Média dos Alunos</title>
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
<div class="titulo"> <h2>Média das Notas</h2><br></div>

<?php if($totalAlunos > 0) { ?>

<table class="tabela-media">
    <tr>
        <th>Total de Alunos</th>
        <th>Média das Notas</th>
    </tr>
    <tr>
        <td><?php echo $totalAlunos; ?></td>
        <td><?php echo number_format($media, 2); ?></td>
    </tr>
</table>

<?php }
 else {
?>
<p class="mensagem">Nenhum aluno cadastrado.</p>

<?php } ?>

<footer class="footer-paginas">
Realizado por: Camila Macedo Mendes | Juliana Nascimento dos Santos
</footer>


</body>
</html>