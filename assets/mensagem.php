<?php

    function gravarMensagem() {
        $nome = $_POST['nome'];
        $numero = $_POST['numero'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];

        $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

        if (empty($nome)) {
            $query = "INSERT INTO tb_mensagens (numero, assunto, mensagem) VALUES (:numero, :assunto, :mensagem)";

            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':numero', $numero);
            $stmt->bindValue(':assunto', $assunto);
            $stmt->bindValue(':mensagem', $mensagem);

            $stmt->execute();
        }
        else if (empty($numero)) {
            $query = "INSERT INTO tb_mensagens (nome, assunto, mensagem) VALUES (:nome, :assunto, :mensagem)";

            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':assunto', $assunto);
            $stmt->bindValue(':mensagem', $mensagem);

            $stmt->execute();
        }

        else if (empty($nome) && empty($numero)) {
            $query = "INSERT INTO tb_mensagens (assunto, mensagem) VALUES (:assunto, :mensagem)";

            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':assunto', $assunto);
            $stmt->bindValue(':mensagem', $mensagem);

            $stmt->execute();
        }
        else {
            $query = "INSERT INTO tb_mensagens (nome, numero, assunto, mensagem) VALUES (:nome, :numero, :assunto, :mensagem)";

            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':numero', $numero);
            $stmt->bindValue(':assunto', $assunto);
            $stmt->bindValue(':mensagem', $mensagem);
    
            $stmt->execute();
        }
    }

    if (isset($_POST['assunto']) && !empty($_POST['assunto']) && isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
        gravarMensagem();
        header('Location: ../contato.php?sucesso=1');
    }
    else {
        header('Location: ../contato.php?erro=1');
    }

?>