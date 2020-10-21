<?php include('./banco-de-dados/conexao.php'); 

$SALVAR = $_POST['SALVAR'];

if (isset($SALVAR)) {
    $nome = $_POST['nome_produto'];
    $descricao = $_POST['descricao_produto'];
    $preco = $_POST['preco_produto'];
    $imagem = $_POST['imagem_produto'];
    $categoria = $_POST['categoria_produto'];

    $inserir = "INSERT INTO produtos (nome_produto, descricao_produto, preco_produto, imagem_produto, categoria_produto) VALUES ( '$nome', '$descricao', '$preco', '$imagem', '$categoria')";


    if (mysqli_query($conn, $inserir)) {
        echo "<script> alert('Criado com sucesso!')</script>";
        echo "<script> window.location.href='listar.php'</script>";
    } else {
        echo "Error: " . $inserir . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<style>
    a {
        text-decoration: none;
        color: white;
    }

    h1 {
        text-align: center;
        font-size: 50px;
    }
</style>

<body>
    <br><br>

    <div class="container-lg">


        <a href="listar.php">
            <button type="button" class="btn btn-primary btn-lg btn-block">
                Voltar para a lista
            </button>
        </a>

        <br><br>
        
        <h1>CRIAR</h1>

        <br><br>

        <form action="" method="post">
            <div class="form-group">
                <label for="nome_produto">Nome do Produto</label>
                <input id="nome_produto" name="nome_produto" type="text" class="form-control" placeholder="Nome do Produto" required>
            </div>

            <div class="form-group">
                <label for="descricao_produto">Descrição do Produto</label>
                <textarea id="descricao_produto" name="descricao_produto" type="text" class="form-control" placeholder="Descrição do Produto" required></textarea>
            </div>

            <div class="form-row">
                <div class="col-7">
                    <label for="imagem_produto">Imagem do Produto</label>
                    <input id="imagem_produto" name="imagem_produto" type="text" class="form-control" placeholder="Link da Imagem" required>
                </div>

                <div class="col">
                    <label for="preco_produto">Preço do Produto</label>
                    <input id="preco_produto" name="preco_produto" type="number" class="form-control" placeholder="Preço do Produto" required>
                </div>

                <div class="col">
                    <label for="categoria_produto">Categoria do Produto</label>
                    <input id="categoria_produto" name="categoria_produto" type="text" class="form-control" placeholder="Categoria do Produto" required>
                </div>
            </div>

            <br>
            <button type="submit" id="SALVAR" name="SALVAR" class="btn btn-success btn-lg btn-block">Criar Produto</button>
        </form>
    </div>
</body>

</html>