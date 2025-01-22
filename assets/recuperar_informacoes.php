<?php

function recuperarInfo($tipo) {

    $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

    if ($tipo == 'pedidos') {
        $query = "SELECT * FROM tb_pedidos";
    }
    else if ($tipo == 'produtos') {
        $query = "SELECT * FROM tb_produtos";
    }
    else if ($tipo == 'contatos') {
        $query = "SELECT * FROM tb_contatos";
    }
    else if ($tipo == 'mensagens') {
        $query = "SELECT * FROM tb_mensagens";
    }

    $stmt = $pdo->query($query);
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $retorno;
}

function retornarProdutos($id) {
    $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

    $query = "SELECT tb_produtos.nome, tb_produtos.tamanho FROM tb_pedidos INNER JOIN tb_pedidos_produtos ON (tb_pedidos.id = tb_pedidos_produtos.id_pedido) LEFT JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id) WHERE tb_pedidos.id = $id";

    $stmt = $pdo->query($query);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $produtos;
}

function statusPedido() {
    $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

    if (isset($_GET['concluido'])) {
        $id = $_GET['concluido'];
        $query = "UPDATE tb_pedidos SET status = 1 WHERE id = $id";
        $pdo->query($query);
    }
    else if (isset($_GET['pendente'])) {
        $id = $_GET['pendente'];
        $query = "UPDATE tb_pedidos SET status = 0 WHERE id = $id";
        $pdo->query($query);
    }
    else if (isset($_GET['remover'])) {
        $id = $_GET['remover'];
        $query = "DELETE FROM tb_pedidos_produtos WHERE id_pedido = $id; DELETE FROM tb_pedidos WHERE id = $id";
        $pdo->query($query);
    }
}

statusPedido();

?>