<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Target Php</title>
</head>
<body>
    <?php
        $nom = $prenom = $mail = "";

        function securisation($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = strip_tags($data);
            return $data;
        }

        $nom = securisation($_POST['nom']);
        $prenom = securisation($_POST['prenom']);
        $mail = securisation($_POST['mail']);

        try {
            $serveur = "localhost";
            $login = "root";
            $pass = "";

            $connection = new PDO("mysql:host=$serveur;dbname=test;charset=utf8", $login, $pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                INSERT INTO users(nom, prenom, mail)
                VALUES(:nom, :prenom, :mail) 
            ";

            $request = $connection->prepare($sql);

            $request->bindParam(':nom', $nom);
            $request->bindParam(':prenom', $prenom);
            $request->bindParam(':mail', $mail);

            $request->execute();
        }
        catch(PDOException $e){
            echo 'Echec : ' .$e->getMessage();
        }
    ?>
</body>
</html>