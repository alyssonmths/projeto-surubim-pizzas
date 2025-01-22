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
    <!-- Contato style -->
    <link rel="stylesheet" href="styles/contato.css">
    <!-- Carrinho css -->
    <link rel="stylesheet" href="styles/carrinho.css">
    <!-- Script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body onload="aplicarIndicador(window.location.pathname)">
    <header>
        <?php require "assets/navbar.html"; ?>
    </header>

    <div id="banner">
        <h1>Nos contate</h1>
        <p>Estamos aqui para te ajudar! Desde ajuda com pedidos até reclamações, sinta-se livre para enviar uma mensagem para nós.</p>
    </div>

    <?php
        if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) { ?>
            <div class="alert alert-success w-25 mx-auto mt-4 text-center" role="alert">
                Mensagem enviada!
            </div>
        <?php } else if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
            <div class="alert alert-warning w-25 mx-auto mt-4 text-center" role="alert">
                Preencha todos os campos obrigatórios!
            </div>
        <?php } ?>

    <section>
        <div id="endereco" class="card">
            <div class="card-body">
                <h5 class="card-title">SURUBIM</h5>
                <p><i class="bi bi-geo-alt-fill"></i> Av. São Sebastião, 608 - Cabaceira, 55750-000</p>
                <p><i class="bi bi-telephone-fill"></i> (81) 3634-0083</p>
            </div>
        </div>

        <div id="mensagem" class="card p-3">
            <div class="card-body">
                <h4 class="card-title text-center">Manda uma mensagem</h4>
                <form action="assets/mensagem.php" method="POST">
                    <input name="nome" type="text" placeholder="Nome (opcional)" class="form-control">
                    <input name="numero" type="number" placeholder="WhatsApp (opcional)" class="form-control">
                    <input name="assunto" type="text" placeholder="Assunto" class="form-control">
                    <textarea name="mensagem" placeholder="Mensagem" class="form-control"></textarea>
                    <button type="submit" class="btn w-100 mt-3">Enviar</button>
                </form>
            </div>
        </div>
    </section>


    <?php require "assets/footer.html" ?>

    <script src="scripts/script.js"></script>
    <script src="scripts/carrinho.js"></script>
    <script src="scripts/indicador.js"></script>
</body>
</html>