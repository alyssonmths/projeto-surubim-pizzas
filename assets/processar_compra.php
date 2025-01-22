<?php
    session_start();

    function registrarCompra($endereco, $numero_casa, $bairro, $referencia, $nome, $celular) {
        $query = 'INSERT INTO tb_pedidos (nome, celular, rua, numero_casa, bairro, referencia) VALUES (:nome, :celular, :rua, :numero_casa, :bairro, :referencia)';

        $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
        $stmt = $pdo->prepare($query);
        
        $stmt->bindValue(':rua', $endereco);
        $stmt->bindValue(':numero_casa', $numero_casa);
        $stmt->bindValue(':bairro', $bairro);
        $stmt->bindValue(':referencia', $referencia);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':celular', $celular);

        $stmt->execute();
        $_GET['compra'] = 'sucesso';
    }

    if (isset($_POST['endereco']) && !empty($_POST['endereco']) && 
    isset($_POST['numero_casa']) && isset($_POST['bairro']) && !empty($_POST['bairro']) && isset($_POST['referencia']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['celular']) && !empty($_POST['celular']) && isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        registrarCompra(
            $_POST['endereco'],
            $_POST['numero_casa'],
            $_POST['bairro'],
            $_POST['referencia'],
            $_POST['nome'],
            $_POST['celular']
        );
    }
    else {
        header('Location: ../finalizar_compra.php?erro=1');
    }

    function recuperarIdCompra() {
        $query = "SELECT id from tb_pedidos ORDER BY id DESC";
        $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

        $stmt = $pdo->query($query);
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id;
    }

    $id = recuperarIdCompra();

    function inserirRelacaoPedidoProduto ($id) {
        foreach ($_SESSION['carrinho'] as $id_produto) {
            $query = "INSERT INTO tb_pedidos_produtos (id_pedido, id_produto) VALUES (:id_pedido, :id_produto)";

            $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id_pedido', $id);
            $stmt->bindValue(':id_produto', $id_produto);
            $stmt->execute();
        }
    }

    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho']) && $_GET['compra'] == 'sucesso') {
        inserirRelacaoPedidoProduto($id['id']);
    }
    else {
        header('Location: ../finalizar_compra.php?erro=2');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: whitesmoke;">
    <?php if ($_GET['compra'] == 'sucesso') { ?>
        <section class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
            <div>
                <h1><i class="bi bi-check2-circle text-success"></i> Pedido realizado com sucesso!</h1>
                <h4>N° do pedido: <?= $id['id'] ?></h4>
            </div>
            <img src="../images/logo.jpg" width="200px" style="border-radius: 20px;">
            <a href="../index.php" class="btn btn-warning mt-3 w-50">Continue comprando</a>
        </section>
    <?php } if($_GET['compra'] == 'sucesso') {session_destroy();} ?>
    
</body>
</html>