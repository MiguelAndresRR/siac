<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $contrasena = 'holamundo';
    $contrahash = hash($contrasena, PASSWORD_BCRYPT, ['cost' => 12]);
    echo $contrahash;
    ?>
    
</body>
</html>