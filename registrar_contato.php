<?php
    function registrarContato() {
        if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['whatsapp']) && !empty($_POST['whatsapp'])) {
            $nome = $_POST['nome'];
            $numero = $_POST['whatsapp'];
            $query = 'INSERT INTO tb_contatos(nome, numero)values(:nome, :numero)';
    
            $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':numero', $numero);
            $stmt->execute();

            header('Location: index.php?sucesso=true');
        }
        else {
            header('Location: index.php?erro=1');
        }
    }
    registrarContato();
?>