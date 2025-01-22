<?php
    require "../assets/validar_login.php";

    function atualizarProduto($id) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        if (isset($_POST['tamanho'])) {
            $tamanho = $_POST['tamanho'];
        }
        $valor = $_POST['valor'];

        $query = "UPDATE tb_produtos SET nome = '$nome', descricao = '$descricao', tamanho = '$tamanho', valor = '$valor' WHERE id = '$id'";

        $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
        $pdo->query($query);

        header('Location: produtos.php?atualizar=sucesso');
    }

    atualizarProduto($_GET['id']);
?>