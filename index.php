<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    
    <form action="./traitement/traitement_formulaire.php" method="post">
        <label for="email">email :</label>
        <input type="text" name="email" required>

        <label for="password">password :</label>
        <input type="password" name="password" required>

        <input type="submit" value="save">
    </form>
</body>
</html>
