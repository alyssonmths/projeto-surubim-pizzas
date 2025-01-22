<?php
    function recuperarProdutos($categoria) {
        if ($categoria == 'tudo') {
            $query = 'SELECT * FROM tb_produtos';

            $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
            $stmt = $pdo->query($query);
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $produtos;
        }
        else {
            $query = "SELECT * FROM tb_produtos WHERE categoria = :categoria";

            $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':categoria', $categoria);
            $stmt->execute();

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $produtos;
        }
    }
?>