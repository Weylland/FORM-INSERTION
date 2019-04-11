<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test 2</title>
</head>
<body>
    <form method="POST" action="target.php">
        <p>
            <label for="nom">Entrez votre nom : </label>
            <input type="text" name="nom" id="nom">
        </p>
        <p>
            <label for="prenom">Entrez votre prenom : </label>
            <input type="text" name="prenom" id="prenom">
        </p>
        <p>
            <label for="mail">Entrez votre mail</label>
            <input type="text" name="mail" id="mail">
        </p>
        <p>
            <input type="submit" value="Envoyez">
        </p>
    </form>
</body>
</html>