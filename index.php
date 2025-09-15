<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Cryptage</title>
</head>
<body>
<div class="container">
    <a href="hash.php" class="btn btn-primary my-3">Hash de mot de passe</a>
    <div class="row">
        <?php
            require "config/connexion.php";
        /**
         * @var PDO $bdd
         */
            $select = $bdd->query("SELECT * FROM user");
            while ($data = $select->fetch())
            {
                echo "<div class='col-md-4 my-3'>";
                    echo "<div class='card'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>".$data['login']."</h5>";
                            echo "<p class='card-text'>algo: ".$data['algo']."</p>";
                            echo "<p class='card-text'>hash: ".$data['password']."</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
    <div class="text-center mt-3">
        <a href="verif.php" class="btn btn-success">Démo connexion</a>
    </div>
</div>
</body>
</html>