<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles/login.css">
    <?php
        if (isset($_POST['usuario']) && isset($_POST['senha'])) {
            $query = "SELECT * FROM tb_login WHERE usuario = :usuario AND senha = :senha";
            $pdo = new PDO('mysql:host=localhost;dbname=surubim_pizzas', 'root', '');
            
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':usuario', $_POST['usuario']);
            $stmt->bindValue(':senha', $_POST['senha']);
            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($retorno) == 1) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['id'] = $retorno[0]['id'];

                header('Location: pedidos.php');
            }
            else {
                header('Location: login.php?erro=1');
            }
        }
    ?>
</head>
<body>
    <?php if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
        <div id="alerta" class="alert alert-warning" role="alert" style="position: absolute; top: 20px;">
            Usuário ou senha inválidos!
        </div>
    <?php } else if (isset($_GET['erro']) && $_GET['erro'] == 2) { ?>
        <div id="alerta" class="alert alert-warning" role="alert" style="position: absolute; top: 20px;">
            Você deve estar logado para acessar a dashboard!
        </div>
    <?php } ?>

    <div class="container">
        <div class="login-box">
            <h1>Login</h1>
            <form action="" method="POST">
                <div class="textbox">
                    <input name="usuario" type="text" placeholder="Usuário" class="form-control">
                </div>
                <div class="textbox">
                    <input name="senha" type="password" placeholder="Senha" class="form-control">
                </div>
                <input type="submit" class="btn" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>