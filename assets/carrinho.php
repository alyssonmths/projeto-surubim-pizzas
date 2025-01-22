<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="d-flex align-items-center">
        <h1 class="text-center my-4" style="flex: 2;"><i class="bi bi-cart3"></i> Carrinho de compras</h1>
        <button id="botao-fechar" class="btn"><i class="bi bi-x-lg text-light"></i></button>
    </div>
    <hr>

    <?php
        session_start();

        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
            $valores = '';

            foreach ($_SESSION['carrinho'] as $value) {
                $valores .= $value.', ';
            }
            
            $valores = substr($valores, 0, -2);
    
            $query = "SELECT * FROM tb_produtos WHERE id in ($valores)";
    
            $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
            $stmt = $pdo->query($query);
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    ?>

    <?php 
        $soma = 5;

        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
            foreach ($produtos as $key => $value) { ?>
                <div id="item-carrinho" class="item d-flex justify-content-center align-items-center gap-4">
                    <h1><?= $key+1 ?>.</h1>
                    <img src="images/<?= $value['categoria'] ?>/<?= $value['imagem'] ?>" style="width: 200px;">
                    <div>
                        <h1><?= $value['nome'] ?></h1>
                        <p>Tamanho: <?= $value['tamanho'] ?> | Quantidade: 1</p>
                        <h4 class="text-success">R$<?= $value['valor'] ?></h4>
                    </div>
                    <a href="finalizar_compra.php?remover=<?= $value['id'] ?>" class="btn" onclick=""><i class="bi bi-x-lg text-dark"></i></a>
                </div>
            <?php $soma += $value['valor']; }} else { ?>
                <div>
                    <p>O carrinho está vazio. Adicione itens</p>
                </div>
            <?php } ?>

    <div class="d-flex flex-column justify-content-center gap-3 mt-3">
        <h4 class="text-center">Entrega: R$5,00</h4>
        <h3 class="text-center">Total: <span class="text-success">R$<?= $soma; ?></span></h3>
        <a id="finalizar_compra" href="finalizar_compra.php" class="btn" style="background-color: rgb(252, 214, 46);">Finalizar compra</a>
    </div>
</body>
</html>