<?php
    // init login
    $login = "";

    if(isset($_POST['login']) && isset($_POST['password']))
    {
        if(empty($_POST['login']) || empty($_POST['password']))
        {
            $erreur = "Veuillez remplir tous les champs";
        }else{
            $login = htmlspecialchars($_POST['login']);
            $password = $_POST['password'];

            require "config/connexion.php";
            /**
             * @var PDO $bdd
             */
            $select = $bdd->prepare("SELECT * FROM user WHERE login = ?");
            $select->execute([$login]);
            $data = $select->fetch();
            $select->closeCursor();
            if(!$data)
            {
                $erreur = "Ce login n'existe pas";
            }else{
                if(password_verify($password, $data['password']))
                {
                    $valid = "Vos login et mot de passe sont correct";
                }else{
                    $erreur = "Mot de passe incorrect";
                }
            }
        }
    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Cryptage - vérification</title>
</head>
<body>
    <div class="container">
        <h1>Formulaire de vérification</h1>
        <?php
            if(isset($erreur))
            {
                echo "<div class='alert alert-danger my-3'>".$erreur."</div>";
            }

        ?>
        <form action="verif.php" method="POST">
            <div class="form-group my-3">
                <label for="login">Login: </label>
                <input type="text" name="login" id="login" class="form-control" value="<?= $login ?>">
            </div>
            <div class="form-group my-3">
                <label for="password">Mot de passe: </label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Valider" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary mx-2">Retour</a>
            </div>
        </form>


        <?php
            if(isset($valid))
            {
                echo "<div class='alert alert-success my-3'>".$valid."</div>";
            }
        ?>
    </div>
</body>
</html>