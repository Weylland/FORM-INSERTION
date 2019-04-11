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
        $mail = securisation($_POST['mail']);

        $serveur = "localhost";
        $login = "root";
        $pass = "";

        try {
            $connexion = new PDO("mysql:host=$serveur;dbname=test", $login, $pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $requete = $connexion->prepare("
                INSERT INTO users(nom, prenom, mail)
                VALUES (:nom, :prenom, :mail)
            ");
    
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':mail', $mail);
    
            $requete->execute();
    
            echo 'Insertion réussie';
        }
        catch(PDOException $e) {
            echo 'Echec : ' .$e->getMessage();
        }
    ?>
</body>
</html>