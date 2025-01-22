<?php
    session_start();

    function adicionarCarrinho($id) {
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
        
        array_push($_SESSION['carrinho'], $id);
    }

    adicionarCarrinho($_GET['add']);

    header('Location: ../cardapio.php?categoria=tudo&adicionado=sucesso');
?>