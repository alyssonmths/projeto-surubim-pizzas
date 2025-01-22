<?php
    require "../assets/validar_login.php";

    if (isset($_GET['remover'])) {
        $id = $_GET['remover'];

        $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

        $pdo->query("DELETE FROM tb_produtos WHERE id = $id");

        header('Location: produtos.php?removido=1');
    }
?>