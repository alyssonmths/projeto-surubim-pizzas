<?php
    require "assets/recuperar_produtos.php";

    $produtos = recuperarProdutos($_GET['categoria']);

    // echo '<pre>';
    // print_r($produtos);
    // echo '</pre>';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surubim Pizzas</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Style -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Cardápio css -->
    <link rel="stylesheet" href="styles/cardapio.css">
    <!-- Carrinho css -->
    <link rel="stylesheet" href="styles/carrinho.css">
    <!-- Script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body onload="aplicarIndicador(window.location.pathname); aplicarIndicadorCategoria(window.location.search);">
    <header>
        <?php require "assets/navbar.html"; ?>
    </header>

    <section>
        <h1><i class="bi bi-list me-1"></i> Cardápio</h1>
        <div class="d-flex align-items-center mt-2 mb-5">
            <i class="bi bi-search me-2"></i>
            <input type="text" placeholder="Pesquisar..." class="form-control">
        </div>

        <?php 
            if (isset($_GET['adicionado']) && $_GET['adicionado'] == 'sucesso') { ?>
                <div id="alerta-sucesso" class="alert alert-success" role="alert">
                    <div class="d-flex gap-2 align-items-center">
                        Produto adicionado ao seu carrinho!
                        <button id="botao-fechar" class="btn"><i class="bi bi-x-lg text-dark" onclick="document.getElementById('alerta-sucesso').remove();"></i></button>
                    </div>
                </div>
            <?php } ?>


        <div id="cardapio" class="pb-5">
            <div id="categorias" class="d-flex justify-content-around my-4">
                <a id="tudo" href="cardapio.php?categoria=tudo">Tudo</a>
                <a id="Pizza" href="cardapio.php?categoria=Pizza">Pizzas</a>
                <a id="Lasanha" href="cardapio.php?categoria=Lasanha">Lasanha</a>
                <a id="Sobremesa" href="cardapio.php?categoria=Sobremesa">Sobremesa</a>
                <a id="Bebida" href="cardapio.php?categoria=Bebida">Bebidas</a>
            </div>

            <!-- ---------------------------------------- -->
            
            <div id="cards" class="row justify-content-center gap-4"> 
                <?php
                    foreach ($produtos as $produto) { ?>
                        <div class="card col-5 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                            <img src="images/<?= $produto['categoria']?>/<?= $produto['imagem'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $produto['nome'] ?></h5>
                                <p class="card-text"><?= $produto['descricao'] ?></p>
                                <p>Tamanho: <?= $produto['tamanho'] ?> | Valor: R$<?= $produto['valor'] ?></p>
                                <a href="assets/adicionar_carrinho.php?add=<?= $produto['id'] ?>" class="btn">Adicionar ao carrinho</a>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </section>


    <?php require "assets/footer.html" ?>

    <script src="scripts/script.js"></script>
    <script src="scripts/carrinho.js"></script>
    <script src="scripts/indicador.js"></script>
</body>
</html>