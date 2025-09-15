<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
/* variable => epse
 fixe : grain de sel => "textespecial"
 fixe : grain de sel => "fdsqfkljdsfkl"
 fixe : grain de sel => "fsqdjfklsdqlfkjdskfl"

    $motdepasse = "epsetextespecial";
    $motdepasse = "fsqdjfklsdqepselfkjdskfl";*/


/*$hash = password_hash("epse",PASSWORD_ARGON2I);

echo $hash;*/

?>

<form action="hash.php" method="POST">
    <div class="form-group">
        <label for="password">Mot de passe à crypter</label>
        <input type="text" name="password" id="password">
    </div>
    <div class="form-group">
        <input type="submit" value="Envoyer">
    </div>
</form>

<?php
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
        $hash = password_hash($password,PASSWORD_ARGON2I);
        echo $hash;
    }
?>



</body>
</html>