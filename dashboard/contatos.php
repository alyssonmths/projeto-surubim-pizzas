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
            <h1><i class="bi bi-person-lines-fill"></i> Contatos</h1>

            <?php
                $return = recuperarInfo('contatos');

                if (isset($_GET['adicionar']) or isset($_GET['remover']) or isset($_GET['apagar'])) {
                    $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');

                    if (isset($_GET['adicionar'])) {
                        $id = $_GET['adicionar'];
                        $query = "UPDATE tb_contatos SET adicionado = 1 WHERE id = '$id'";
                    }
                    else if (isset($_GET['remover'])) {
                        $id = $_GET['remover'];
                        $query = "UPDATE tb_contatos SET adicionado = 0 WHERE id = '$id'";
                    }
                    else if (isset($_GET['apagar'])) {
                        $id = $_GET['apagar'];
                        $query = "DELETE FROM tb_contatos WHERE id = '$id'";
                    }
                    $pdo->query($query);
                    header('Location: contatos.php');
                }
            ?>

            <div class="row">

                <?php foreach ($return as $value) { ?>
                    <div class="card col-md" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['nome'] ?></h5>
                            <p class="card-text"><?= $value['numero'] ?> </p>
                            <?php if ($value['adicionado'] == 0) { ?>
                                <a href="contatos.php?adicionar=<?= $value['id'] ?>" class="btn" style="background-color: rgb(252, 214, 46);">Marcar como adicionado</a>
                            <?php } else { ?>
                                <a href="contatos.php?remover=<?= $value['id'] ?>" class="btn btn-danger">Marcar como não adicionado</a>
                            <?php } ?>
                            <a href="contatos.php?apagar=<?= $value['id'] ?>" class="btn" style="position: absolute; top: 0px; right: 0px;"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>

    <script src="../scripts/dashboard.js"></script>
</body>
</html>