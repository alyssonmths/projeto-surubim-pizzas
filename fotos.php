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
    <!-- Fotos style -->
    <link rel="stylesheet" href="styles/fotos.css">
    <!-- Carrinho css -->
    <link rel="stylesheet" href="styles/carrinho.css">
    <!-- Script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body onload="aplicarIndicador(window.location.pathname)">
    <header>
        <?php require "assets/navbar.html"; ?>
    </header>

    <section>
        <h1 class="my-4"><i class="bi bi-images me-1"></i> Fotos</h1>
        <div id="fotos" class="row justify-content-center gap-3">

            <?php
                $pasta = 'images/galeria';
                $arquivos = scandir($pasta);

                foreach ($arquivos as $key => $value) {
                    if ($key >= 2) { ?>
                        <div class="col-5 col-md-3 col-lg-2"><img src="<?= $pasta ?>/<?= $value ?>"></div>
                    <?php }} ?>
        </div>
    </section>

    <?php require "assets/footer.html" ?>

    <script src="scripts/script.js"></script>
    <script src="scripts/carrinho.js"></script>
    <script src="scripts/indicador.js"></script>
</body>
</html>