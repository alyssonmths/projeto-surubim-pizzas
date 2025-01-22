<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php 
        require "../assets/sidebar-dashboard.php";
        require "../assets/recuperar_informacoes.php";
        require "remover_produto.php";
        require "../assets/validar_login.php";

        if (isset($_GET['atualizar'])) { ?>
            <div id="alerta" class="alert alert-success d-flex align-items-baseline" role="alert" style="position: fixed; left: 40%; top: 30px; z-index: 1;">
                <span>Produto atualizado com sucesso!</span>
                <button class="btn" onclick="document.getElementById('alerta').remove();"><i class="bi bi-x-lg"></i></button>
            </div>
        <?php } 
            if (isset($_GET['removido'])) { ?>
                <div id="alerta" class="alert alert-success d-flex align-items-baseline" role="alert" style="position: fixed; left: 40%; top: 30px; z-index: 1;">
                    <span>Produto removido com sucesso!</span>
                    <button class="btn" onclick="document.getElementById('alerta').remove();"><i class="bi bi-x-lg"></i></button>
                </div>
        <?php } ?>

    <main>
        <?php if (isset($_GET['sucesso'])) { ?>
            <div id="alerta" class="alert alert-success d-flex align-items-baseline" role="alert" style="position: fixed; left: 40%; top: 30px; z-index: 1;">
                    <span>Produto adicionado</span>
                    <button class="btn" onclick="document.getElementById('alerta').remove();"><i class="bi bi-x-lg"></i></button>
                </div>
        <?php } ?>

        <section class="row gap-1 justify-content-evenly">
            <h1 class="my-4"><i class="bi bi-cart2"></i> Produtos</h1>

            <?php
                $return = recuperarInfo('produtos');
            ?>

            <?php 
                foreach ($return as $value) { 
                    ?>
                    <div class="card mb-3 col-md-5" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center">
                                <img src="../images/<?= $value['categoria'] ?>/<?= $value['imagem'] ?>" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $value['nome'] ?></h5>
                                    <p class="card-text"><?= $value['descricao'] ?></p>
                                    <?php if (isset($value['tamanho'])) { ?>
                                    <p class="card-text"><small class="text-body-secondary">Tamanho: <?= $value['tamanho'] ?></small></p>
                                    <?php } ?>
                                    <h6>Valor: <span class="text-success">R$<?= $value['valor'] ?></span></h6>
                                    
                                    <div class="d-flex">
                                        <div class="dropdown" style="flex: 1;">
                                            <button type="button" class="btn dropdown-toggle w-100" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="background-color: rgb(252, 214, 46);">
                                                <i class="bi bi-pencil-square"></i> Atualizar
                                            </button>
                                            <form class="dropdown-menu p-4" action="atualizar_produto.php?id=<?= $value['id'] ?>" method="POST">
                                                <div class="mb-3">
                                                    <label for="nome" class="form-label">Nome</label>
                                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $value['nome'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="descricao" class="form-label">Descrição</label>
                                                    <textarea class="form-control" name="descricao" id="descricao"><?= $value['descricao'] ?></textarea>
                                                </div>
                                                <?php if (isset($value['tamanho'])) { ?>
                                                    <div class="mb-3">
                                                        <label for="tamanho" class="form-label">Tamanho</label>
                                                        <select name="tamanho" id="tamanho" class="form-select" value="<?= $value['tamanho'] ?>">
                                                            <option value="P">P</option>
                                                            <option value="M">M</option>
                                                            <option value="G">G</option>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                                <div class="mb-3">
                                                    <label for="valor" class="form-label">Valor</label>
                                                    <input type="number" name="valor" id="valor" class="form-control" placeholder="R$" value="<?= $value['valor'] ?>">
                                                </div>
                                                <button type="submit" class="btn btn-success w-100">Atualizar</button>
                                            </form>
                                        </div>
                                        <a href="produtos.php?remover=<?= $value['id'] ?>" class="btn btn-danger">Remover</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?>

            <div>
                <a href="adicionar_produto.php" class="btn btn-success"><i class="bi bi-plus-square me-2"></i>Adicionar produto</a>
            </div>
        </section>
    </main>

    <script src="../scripts/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>