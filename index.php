<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surubim Pizzas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/carrinho.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php require "assets/navbar.html"; ?>

        <section id="hero">
            <div>
                <h1>A melhor <span class="d-block">PIZZA</span> da região</h1>
                <a href="#" class="btn">Conheça</a>
            </div>

            <i class="bi bi-caret-down"></i>
        </section>
    </header>

    <section id="promocao">
        <h1 class="my-5 text-center">Promoção da semana <span class="badge fs-5" style="background-color: rgb(252, 214, 46);">EM DOBRO</span></h1>
        <div id="imagens-pizza">
            <img src="images/pizza1.png">
            <i class="bi bi-plus"></i>
            <img src="images/pizza2.png">
        </div>
        <h4 class="my-4">Pague 1 e leve 2</h4>
        <div class="d-flex justify-content-center align-items-center gap-4">
            <a href="promocao.php" class="btn">Saiba mais</a>
            <p class="w-50">Válido para as pizzas tradicionais tamanho P</p>
        </div>
    </section>

    <section id="sabores" class="pt-4 row justify-content-around align-items-center">
        <div class="col-12 text-center my-3 text-light" style="background-color: rgb(252, 214, 46);">
            <h1>Nossos sabores</h1>
        </div>
        <div class="col-5 ms-5 text-center">
            <label for="select"><h1>Selecione</h1></label>
            <select id="select" class="form-select" onchange="trocarFotoPizza()">
                <option value="calabresa">Calabresa</option>
                <option value="4_queijos">4 Queijos</option>
                <option value="frango">Frango</option>
            </select>
        </div>
        <div class="col d-flex justify-content-center">
            <img id="imagem-pizza" src="images/Pizza/calabresa.png">
        </div>
    </section>

    <section id="menu">
        <img src="images/menu.png" width="300px" style="border-radius: 20px;">
        <div class="d-flex flex-column justify-content-center">
            <h1 class="text-light text-center">Veja o nosso</h1>
            <a href="cardapio.php?categoria=tudo" class="btn">Cardápio</a>
        </div>
    </section>



    <section id="whatsapp">

        <?php 
            if (isset($_GET['sucesso']) && $_GET['sucesso'] == 'true') { ?>
                <div class="alert alert-success text-center" role="alert">
                    Número enviado! Em breve iremos te adicionar e você poderá ver nossos status
                </div>
            <?php } else if (isset($_GET['erro']) && $_GET['erro'] == '1') { ?>
                <div class="alert alert-warning" role="alert">
                    Preencha os campos corretamente!
                </div>
            <?php } ?>

        
        <h1>Nos conheça melhor <i class="bi bi-whatsapp" style="color: green;"></i></h1>
        <p>Digite seu nome e WhatsApp para que possamos te adicionar</p>
        <form action="registrar_contato.php" method="POST" class="w-50 mt-2">
            <input type="text" name="nome" placeholder="Nome" class="form-control">
            <input type="number" name="whatsapp" placeholder="WhatsApp" class="form-control">
            <button type="submit" class="btn w-100 mt-2">Enviar</button>
        </form>
    </section>

    <?php require "assets/footer.html" ?>

    <script src="scripts/script.js"></script>
    <script src="scripts/carrinho.js"></script>
    <script src="scripts/sabores.js"></script>
    <script src="scripts/indicador.js"></script>
</body>
</html>