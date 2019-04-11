<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Target PHP</title>
</head>
<body>
    <?php
        $prenom = $nom = $pseudo = "";

        function securisation($donnees) {
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = strip_tags($donnees);
            return $donnees;
        }

        $prenom = securisation($_POST['prenom']);
        $nom = securisation($_POST['nom']);
        $pseudo = securisation($_POST['pseudo']);

        echo 'Ton nom est : ' .$nom. '</br>';
        echo 'Ton prenom est : ' .$prenom. '</br>';
        echo 'Ton pseudo est : ' .$pseudo;
    ?>
</body>
</html>