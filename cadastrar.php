<!-- PHP - PEGAR OS DADOS DO FORMULÁRIO - COLOCA NO ARRAY -->
<?php
$mensagem = "";
$mensagem2 = "";
$arquivo = "alunos.txt";

if(isset($_GET['sucesso']))
{
    $mensagem = "Aluno cadastrado com sucesso!";
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $nome = trim($_POST['nome']);
    $idade = trim($_POST['idade']);
    $curso = trim($_POST['curso']);
    $nota = trim($_POST['nota']);

    // Array com os dados do aluno
    $alunos = array($nome, $idade, $curso, $nota);

    // Se o arquivo existir, contar quantos alunos já existem
    if(file_exists($arquivo))
    {
        $linhas = file($arquivo);
        $total = count($linhas);
    }
    else
    {
        $total = 0;
    }

    // Limite de 10 alunos
    if($total >= 10)
    {
    $mensagem2 = "Limite de 10 alunos atingido para a turma!";
    }
    else
    {
        // Converter array em texto
        $linha = implode("|", $alunos) . "\n";

        file_put_contents($arquivo, $linha, FILE_APPEND);

        header("Location: cadastrar.php?sucesso=1");
        exit;
    }

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar aluno</title>
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
<div class="titulo"> <h2>Cadastro de Alunos</h2><br></div>

<main class="content-wrapper">

    <div class="container-formulario">


        <form method="POST">
    
            <p>Cadastre os alunos - 10 por turma</p>

            <label for="nome">Nome do Aluno: </label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome completo" required>

            <label for="idade">Idade do Aluno: </label>
            <input type="number" name="idade" id="idade" min="0" max="100" placeholder="Digite somente número" required>

            <label for="curso"> Curso do Aluno: </label>
            <input type="text" name="curso" id="curso" maxlength="100" placeholder="Digite o curso" required>

            <label for="curso"> Digite a nota do Aluno: </label>
            <input type="number" name="nota" id="nota" min="0" max="10" placeholder="Digite nota de 0 a 10" required>
            
            <button type="submit" class="btn-enviar">Cadastrar</button>
        </form>
        <br>

    <?php if($mensagem != "") { ?>
    <p class="mensagem"><?php echo $mensagem; ?></p>
    <?php } ?>

     <!-- MENSAGENS ABAIXO DO FORM - CADASTRADO COM SUCESSO E LIMITE EXCEDIDO -->
    <?php if($mensagem != "") { ?>
        <p class="mensagem"><?php echo $mensagem; ?></p>
    <?php } ?>

    <?php if($mensagem2 != "") { ?>
        <p class="mensagem-limite"><?php echo $mensagem2; ?></p>
    <?php } ?>
    
    </div> 
</main>


<footer class="footer-paginas">
Realizado por: Camila Macedo Mendes | Juliana Nascimento dos Santos
</footer>

</body>
</html>

