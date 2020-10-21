<?php include_once('./banco-de-dados/conexao.php'); 

// QUERY
$palavra_chave = $_POST['FILTRO'];
$opcao = isset($palavra_chave) ? $palavra_chave : false;

if ($opcao) {
    $sql = "SELECT * FROM produtos WHERE categoria_produto = '$palavra_chave'";
} else {
    $sql = "SELECT * FROM produtos";
}

if (mysqli_query($conn, $sql)) {
    $resultado = mysqli_query($conn, $sql);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// FIM QUERY


// LISTA SELECT CATEGORIAS
$sql_categorias = "SELECT DISTINCT categoria_produto FROM produtos";

if (mysqli_query($conn, $sql_categorias)) {
    $categorias = mysqli_query($conn, $sql_categorias);
} else {
    echo "Error: " . $sql_categorias . "<br>" . mysqli_error($conn);
}
// FIM LISTA
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>

<script>
    confirmarRemocao = (id) => {
        let deletar = confirm('Deseja mesmo deletar este produto?');
        if (deletar) {
            window.location.href = `deletar.php?ID=${id}`;
        }
    }
</script>

<body>

    <br><br>

    <div class="container-lg">

        <a href='index.php' style="text-decoration: none; color: white;">
            <button type="button" class="btn btn-primary btn-lg btn-block">
                Voltar para o início
            </button>
        </a>

        <br><br>

        <form action="listar.php" method="post">
            <div class="input-group">
                <select name="FILTRO" class="custom-select">
                    <option value="">Todos</option>
                    <?php while ($dado = $categorias->fetch_array()) { ?>
                        <option value="<?php echo $dado['categoria_produto']; ?>"><?php echo $dado['categoria_produto']; ?></option>
                    <?php } ?>
                </select>
                <div class="input-group-append">

                    <input type="submit" class="btn btn-primary" value="Filtrar">
                </div>
            </div>
        </form>

        <br><br>

        <a href='criar.php' style="text-decoration: none; color: white;">
            <button type="button" class="btn btn-info btn-lg ">
                Cadastrar novo Produto
            </button>
        </a>

        <br><br>

        <table class="table table-sm" style="text-align: center;">
            <thead class="thead-dark">
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço produto</th>
                <th>Imagem produto</th>
                <th>Categoria produto</th>
                <th>Ações</th>
            </thead>

            <?php while ($dado = $resultado->fetch_array()) { ?>

                <tr>
                    <td><?php echo $dado['id_produto']; ?></td>
                    <td><?php echo $dado['nome_produto']; ?></td>
                    <td><?php echo $dado['descricao_produto']; ?></td>
                    <td><?php echo $dado['preco_produto']; ?></td>
                    <td><?php echo $dado['imagem_produto']; ?></td>
                    <td><?php echo $dado['categoria_produto']; ?></td>
                    <td style="text-align: center;">
                        <a class="badge badge-info" href="editar.php?ID=<?php echo $dado['id_produto']; ?>">Editar</a>
                        <a class="badge badge-danger" onclick="confirmarRemocao(<?php echo $dado['id_produto']; ?>)">Excluir</a>
                    </td>
                </tr>

            <?php } ?>
        </table>

    </div>


</body>

</html>
