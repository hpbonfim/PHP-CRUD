<?php include_once('./banco-de-dados/conexao.php'); 

// PEGA AS INFORMAÇOES DO BANCO
$ID_PRODUTO = $_GET['ID'];
$opcao = isset($ID_PRODUTO) ? $ID_PRODUTO : false;

if ($opcao) {
    $sql = "SELECT * FROM produtos WHERE id_produto = '$ID_PRODUTO'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) <= 0) {
        // retorna a listagem se não existir o id digitado
        echo "<script>alert('Página invalida')</script>";
        echo "<script>window.location.href='listar.php'</script>";
    }
} else {
    // Retorna a listagem se caso ocorra da pessoa digitar o endereço (http://localhost/editar.php?id=1) sem o (?id=1)
    echo "<script>alert('Página invalida')</script>";
    echo "<script>window.location.href='listar.php'</script>";
}

// FIM

$SALVAR = $_POST['SALVAR'];

if (isset($SALVAR)) {
    $id = $_POST['id_produto'];
    $nome = $_POST['nome_produto'];
    $descricao = $_POST['descricao_produto'];
    $preco = $_POST['preco_produto'];
    $imagem = $_POST['imagem_produto'];
    $categoria = $_POST['categoria_produto'];

    $update = "UPDATE produtos SET nome_produto='$nome', descricao_produto='$descricao', preco_produto='$preco', imagem_produto='$imagem', categoria_produto='$categoria' WHERE id_produto=$id";

    if (mysqli_query($conn, $update)) {
        echo "<script> alert('Editado com sucesso!')</script>";
        echo "<script> window.location.href='listar.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
        <h1>EDITAR</h1>
        <br><br>

        <form action="" method="post">
            <?php while ($dado = $resultado->fetch_array()) { ?>

                <input id="id_produto" name="id_produto" type="hidden" value="<?php echo $dado['id_produto'] ?>">


                <div class="form-group">
                    <label for="nome_produto">Nome do Produto</label>
                    <input id="nome_produto" name="nome_produto" type="text" class="form-control" placeholder="Nome do Produto" value="<?php echo $dado['nome_produto'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="descricao_produto">Descrição do Produto</label>
                    <textarea id="descricao_produto" name="descricao_produto" type="text" class="form-control" placeholder="Descrição do Produto" required><?php echo $dado['descricao_produto']; ?></textarea>
                </div>

                <div class="form-row">
                    <div class="col-7">
                        <label for="imagem_produto">Imagem do Produto</label>
                        <input id="imagem_produto" name="imagem_produto" type="text" class="form-control" placeholder="Link da Imagem" value="<?php echo $dado['imagem_produto']; ?>" required>
                    </div>

                    <div class="col">
                        <label for="preco_produto">Preço do Produto</label>
                        <input id="preco_produto" name="preco_produto" type="number" class="form-control" placeholder="Preço do Produto" value="<?php echo $dado['preco_produto']; ?>" required>
                    </div>

                    <div class="col">
                        <label for="categoria_produto">Categoria do Produto</label>
                        <input id="categoria_produto" name="categoria_produto" type="text" class="form-control" placeholder="Categoria do Produto" value="<?php echo $dado['categoria_produto']; ?>" required>
                    </div>
                </div>

            <?php } ?>
            <br>
            <button type="submit" id="SALVAR" value="SALVAR" name="SALVAR" class="btn btn-success btn-lg btn-block">Salvar edição</button>
        </form>
    </div>
</body>

</html>
