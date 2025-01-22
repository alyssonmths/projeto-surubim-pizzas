<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/carrinho.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        #carrinho-btn {
            display: none;
        }
        #botao-fechar {
            display: none;
        }
        #finalizar_compra {
            display: none;
        }
    </style>
</head>
<body onload="exibirCarrinho('finalizar_compra')">
    <header>
        <?php require "assets/navbar.html"; ?>
    </header>

    <?php
        session_start();

        if (isset($_GET['remover'])) {
            $id = $_GET['remover'];
        }

        if (isset($_SESSION['carrinho']) && isset($_GET['remover'])) {
            foreach ($_SESSION['carrinho'] as $key => $value) {
                if ($value == $id) {
                    unset($_SESSION['carrinho'][$key]);
                }
            }
        }
    ?>

    <div id="divCarrinho">
    </div>
    
    <div id="entrega">
        <?php
            if (isset($_GET['erro']) && ($_GET['erro'] == 1 || $_GET['erro'] == 2)) { ?>
                <div class="alert alert-warning" role="alert">
                    Verifique se os dados foram preenchidos corretamente!
                </div>
            <?php } ?>
        <h3>Dados de entrega</h3>
        <form action="assets/processar_compra.php" method="POST">
            <label for="endereco">Rua: </label>
            <input id="endereco" type="text" class="form-control" placeholder="Ex: Rua Estela Motta" name="endereco">
            <label for="numero_casa">N° da casa</label>
            <input name="numero_casa" type="number" id="numero_casa" class="form-control w-25">
            <label for="bairro">Bairro: </label>
            <select name="bairro" id="bairro" class="form-select">
                <option value="">Selecione</option>
                <option value="Cabaceira">Cabaceira</option>
                <option value="Centro">Centro</option>
                <option value="Chã do Marinheiro">Chã do Marinheiro</option>
                <option value="Cohab">Cohab</option>
                <option value="Coqueiro">Coqueiro</option>
                <option value="Santo Antônio">Santo Antônio</option>
                <option value="São José">São José</option>
                <option value="São Sebastião">São Sebastião</option>
            </select>
            <label for="referencia">Ponto de referência:</label>
            <input type="text" class="form-control" placeholder="Próximo a..." name="referencia">
            <h3 class="mt-4 text-center">Dados do cliente</h3>
            <label for="nome">Nome: </label>
            <input type="text" class="form-control" name="nome">
            <label for="contato">Celular</label>
            <input type="text" class="form-control" name="celular">

            <button type="submit" class="btn w-100 mt-3">Enviar</button>
        </form>
    </div>

    <script src="scripts/script.js"></script>
    <script src="scripts/carrinho.js"></script>
</body>
</html>