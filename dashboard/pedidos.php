<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .toast:not(.show) {
            display: block;
        }
    </style>
</head>
<body>
    <?php 
        require "../assets/sidebar-dashboard.php";
        require "../assets/recuperar_informacoes.php";
        require "../assets/validar_login.php";
        $return = recuperarInfo('pedidos');
    ?>

    <main>
        <section class="row gap-3 justify-content-center">
            <h1><i class="bi bi-tags me-1"></i> Pedidos</h1>

            <?php

                foreach ($return as $value) { 
                    $dateTime = new DateTime($value['data']);
                    $dataPedido = $dateTime->format('d/m/Y H:i');

                    $value['produtos'] = [];

                    $produtos = retornarProdutos($value['id']);

                    foreach ($produtos as $key => $produto) {
                        $value['produtos']['produto_'.$key] = $produto['nome'];
                        if (!empty($produto['tamanho'])) {
                            $value['produtos']['tamanho_'.$key] = $produto['tamanho'];
                        }
                    }

                    ?>
                    <div class="col-md-5">
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="../images/logo.jpg" class="rounded me-2" width="30px">
                                <strong class="me-auto">Pedido N°: <?= $value['id'] ?></strong>
                                <?php if ($value['status'] == '0') { ?>
                                    <small class="text-warning">Status: pendente</small>
                                <?php } else { ?>
                                    <small class="text-success">Status: concluído</small>
                                <?php } ?>
                            </div>
                            <div class="toast-body">
                                <h6><span>Nome do cliente:</span> <?= $value['nome'] ?></h6>
                                <h6><span>Celular:</span> <?= $value['celular'] ?></h6>
                                <h6><span>Rua:</span> <?= $value['rua'] ?></h6>
                                <h6><span>N° casa:</span> <?= $value['numero_casa'] ?></h6>
                                <h6><span>Bairro:</span> <?= $value['bairro'] ?></h6>
                                <?php if (!empty($value['referencia'])) { ?>
                                    <h6><span>Referência:</span> <?= $value['referencia'] ?></h6>
                                <?php } ?>
                                <h6><span>Data:</span> <?= $dataPedido ?></h6>
                                <hr>
                                <strong class="me-auto">Detalhes do pedido: </strong>
                                <div class="mt-3">
                                    <?php
                                        foreach ($value['produtos'] as $produto) {
                                            if ($produto != 'P' && $produto != 'M' && $produto != 'G') { ?>
                                                <h6>Produto: <?php echo $produto; ?></h6>
                                            <?php } else if ($produto == 'P' || $produto || 'M' || $produto == 'G') { ?>
                                                <h6>Tamanho: <?php echo $produto; ?></h6>
                                        <?php }} ?>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center align-items-center gap-3">
                                    <a href="pedidos.php?concluido=<?= $value['id'] ?>" class="btn btn-success">Concluído</a>
                                    <a href="pedidos.php?pendente=<?= $value['id'] ?>" class="btn btn-warning">Pendente</a>
                                    <a href="pedidos.php?remover=<?= $value['id'] ?>"><i class="bi bi-x-lg text-dark"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <!-- <div class="col-md-5">
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="../images/logo.jpg" class="rounded me-2" width="30px">
                        <strong class="me-auto">Pedido N°: </strong>
                        <small class="me-2">11 mins ago</small>
                        <small class="text-success">Status: concluído</small>
                    </div>
                    <div class="toast-body">
                        <h6><span class="fw-bold">Nome do cliente:</span> Alysson Matheus</h6>
                        <h6>Celular: 81995985705</h6>
                        <h6>Rua: José Geraldo de Amorim</h6>
                        <h6>N° casa: 48</h6>
                        <h6>Bairro: São Sebastião</h6>
                        <h6>Referência: </h6>
                        <h6>Data: 20/08/2024</h6>
                    </div>
                </div>
            </div> -->

        </section>
    </main>

    <script src="../scripts/dashboard.js"></script>
</body>
</html>