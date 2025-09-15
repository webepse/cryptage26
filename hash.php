<?php
/**
 * Permet de crypter un mot de passe avec le choix de l'algo
 * @param string $password
 * @param string $algo
 * @return string
 */
    function hash_password(string $password, string $algo = PASSWORD_DEFAULT) : string
    {
        switch ($algo)
        {
            case 'PASSWORD_DEFAULT':
                $algo = PASSWORD_DEFAULT;
                break;
            case 'PASSWORD_BYCRYPT':
                $algo = PASSWORD_BCRYPT;
                break;
            case 'PASSWORD_ARGON2I':
                $algo = PASSWORD_ARGON2I;
                break;
            case 'PASSWORD_ARGON2ID':
                $algo = PASSWORD_ARGON2ID;
                break;
            default:
                $algo = PASSWORD_DEFAULT;
                break;
        }

        return password_hash($password, $algo);
    }

    /* init de password pour le formulaire */
    $password = '';


    if(isset($_POST['password']) && isset($_POST['algo']))
    {
        $password = $_POST['password'];
        $algo = $_POST['algo'];
        $hash = hash_password($password, $algo);
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
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Crypter mot de passe</h1>
    <form action="hash.php" method="POST">
        <div class="form-group my-3">
            <label for="password">Mot de passe à crypter</label>
            <input type="text" name="password" id="password" class="form-control" value="<?=$password?>">
        </div>
        <div class="form-group my-3">
            <label for="algo">Algorythme</label>
            <select name="algo" id="algo" class="form-control">
                <?php
                    $tabAlgo = ["PASSWORD_DEFAULT", "PASSWORD_BYCRYPT", "PASSWORD_ARGON2I", "PASSWORD_ARGON2ID"];
                    if(isset($algo))
                    {
                        foreach ($tabAlgo as $myAlgo)
                        {
                            if($myAlgo == $algo)
                            {
                                echo '<option value="'.$myAlgo.'" selected>'.$myAlgo.'</option>';
                            }else{
                                echo '<option value="'.$myAlgo.'">'.$myAlgo.'</option>';
                            }
                        }
                    }else{
                        foreach ($tabAlgo as $myAlgo)
                        {
                            echo '<option value="'.$myAlgo.'">'.$myAlgo.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Envoyer">
        </div>
    </form>

    <?php
        if(isset($hash))
        {
            echo '<div class="alert alert-success"><h3>Résultat:</h3>'.$hash.'</div>';
        }


    ?>

</div>
</body>
</html>