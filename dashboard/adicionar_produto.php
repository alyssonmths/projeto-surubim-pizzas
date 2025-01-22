<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column align-items-center">
    <h2 class="my-3">Adicionar produto</h2>
    <form id="form" class="d-flex flex-column gap-2" action="adicionar_produto.php" method="POST">
        <input id="nome" type="text" name="nome" placeholder="Nome" class="form-control">
        <textarea name="descricao" placeholder="Descrição (opcional)" class="form-control"></textarea>
        <select name="tamanho" class="form-select">
            <option value="">Selecione o tamanho (opcional)</option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
        </select>

        <div class="input-group">
            <span class="input-group-text">R$</span>
            <input id="valor" type="number" class="form-control" name="valor">
        </div>

        <div class="d-flex align-items-center">
            <label for="file" class="me-3 text-secondary" style="cursor: pointer;">Imagem:</label>
            <input name="imagem" type="file" id="file" class="form-control">
        </div>
        <select id="categoria" name="categoria" class="form-select">
            <option value="">Selecione a categoria</option>
            <option value="Pizza">Pizza</option>
            <option value="Lasanha">Lasanha</option>
            <option value="Sobremesa">Sobremesa</option>
            <option value="Bebida">Bebida</option>
        </select>

        <button type="submit" class="btn mb-3" style="background-color: rgb(252, 214, 46);">Salvar</button>
    </form>

    <script src="../scripts/validar_formulario.js"></script>
</body>


<?php

    require "../assets/validar_login.php";

    function adicionarProduto() {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $tamanho = $_POST['tamanho'];
        $valor = $_POST['valor'];
        $imagem = $_POST['imagem'];
        $categoria = $_POST['categoria'];

        $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

        if (!empty($tamanho)) {
            $query = "INSERT INTO tb_produtos(nome, descricao, tamanho, valor, imagem, categoria)values('$nome', '$descricao', '$tamanho', $valor, '$imagem', '$categoria')";
            $pdo->query($query);
        }
        else {
            $query = "INSERT INTO tb_produtos(nome, descricao, valor, imagem, categoria)values('$nome', '$descricao', $valor, '$imagem', '$categoria')";
            $pdo->query($query);
        }

        header('Location: produtos.php?sucesso=1');
    }

    if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['imagem']) && !empty($_POST['imagem']) && isset($_POST['categoria']) && !empty($_POST['categoria'])) {
        adicionarProduto();
    }
?>