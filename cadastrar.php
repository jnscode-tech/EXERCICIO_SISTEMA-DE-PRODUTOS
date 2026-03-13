<!-- PHP - PEGAR OS DADOS DO FORMULÁRIO - COLOCA NO ARRAY -->
<?php
$mensagem = "";
$mensagem2 = "";
$arquivo = "produtos.txt";

$produto = [];
$categoria = [];
$estoque = [];
$preco = [];

if(isset($_GET['sucesso']))
{
    $mensagem = "Produto cadastrado com sucesso!";
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // pegar os dados digitados no FORM
    $produto = trim($_POST['produto']);
    $categoria = trim($_POST['categoria']);
    $estoque = trim($_POST['estoque']);
    $preco = trim($_POST['preco']);

    // colocar nos arrays
    // Array com os dados dos produtos
    $produtos[] = $produto;
    // Array com os dados das categorias
    $categorias[] = $categoria;
    // Array com os dados do estoque
    $estoques[] = $estoque;
    // Array com os dados dos preços
    $precos[] = $preco;

     // Se o arquivo existir, contar quantos produtos já existem
    if(file_exists($arquivo))
    {
        $linhas = file($arquivo);
        $total = count($linhas);
    }
    else
    {
        $total = 0;
    }

    // Limite de 10 produtos
    if($total >= 10)
    {
    $mensagem2 = "Limite de 10 produtos atingido para o estoque";
    }
    else
    {
        // Converter dados em texto
        $linha = $produtos[0] . "|" . $categorias[0] . "|" . $estoques[0] . "|" . $precos[0] . "\n";

       // Salvar no arquivo txt
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
    <title>Cadastro_Produto</title>
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
<div class="titulo"> <h2>Cadastro de Produtos</h2><br></div>

<main class="content-wrapper">

    <div class="container-formulario">

        <form method="POST">
    
            <p>Cadastre os Produtos - Limite de 10 unidades</p>

            <label for="produto">Nome do Produto: </label>
            <input type="text" name="produto" id="produto" placeholder="Digite o nome do produto." required>

            <label for="categoria">Digite a Categoria: </label>
            <input type="text" name="categoria" id="categoria" placeholder="Digite a categoria do produto." required>

            <label for="estoque">Digite a quantidade em estoque: </label>
            <input type="number" name="estoque" id="estoque" min="0" max="10000" placeholder="Digite somente o número." required>

            <label for="preco"> Digite o preço unitário </label>
            <input type="number" name="preco" id="preco" min="0" max="100000"  step="0.01" placeholder="Digite o valor. Ex: 10.50" required>
            
            <button type="submit" class="btn-enviar">Cadastrar</button>
        </form>
        <br>
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

