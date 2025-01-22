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
        require "../assets/validar_login.php";
    ?>

    <main>
        <section>
            <h1><i class="bi bi-chat-dots"></i> Mensagens</h1>

            <?php
                $return = recuperarInfo('mensagens');
            ?>

            <div class="row gap-2">
                <?php foreach ($return as $value) { ?>
                    <div class="card col-md" style="width: 100%;">
                        <i style="position: absolute; left: 10px; top: 10px;" class="bi bi-quote fs-2"></i>
                        <div class="card-body row align-items-center gap-3">
                            <div class="col-md">
                                <h5 class="card-title"><span class="fw-bold">Nome:</span> <?= $value['nome'] ?></h5>
                                <?php if ($value['numero'] != '') { ?>
                                    <h5 class="card-text"><span class="fw-bold">Número:</span> <?= $value['numero'] ?></h5>
                                <?php } ?>
                            </div>
                            <div class="col-md">
                                <h5><span class="fw-bold">Assunto: </span><?= $value['assunto'] ?></h5>
                                <p><span class="fw-bold">Mensagem: </span><?= $value['mensagem'] ?></p>
                            </div>
                            <a href="" class="btn" style="width: fit-content; position: absolute; top: 0px; right: 0px;"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>

    <script src="../scripts/dashboard.js"></script>
</body>
</html>