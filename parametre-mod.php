<?php
require_once 'check.php'; // On inclu la connexion à la bdd

$email = htmlspecialchars($_POST['email-name']);
$numero = htmlspecialchars($_POST['numero-name']);
$adresse = htmlspecialchars($_POST['adresse-name']);

// On regarde si l'utilisateur est inscrit dans la table utilisateurs
$check = $bdd->prepare('SELECT email, telephone, adresse FROM user WHERE email = ?');
$check->execute(array($email));
$row = $check->rowCount();

if($row == 0) {
    echo "Etape 1 <br>";
    // Si les variables existent et qu'elles ne sont pas vides
    if (!empty($_POST['email-name']) || !empty($_POST['numero-name']) || !empty($_POST['adresse-name'])) {
        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        /*
        $sql = "DELETE email FROM user WHERE email='{$email}'";
        $sth = $dbco->prepare($sql);
        $sth->execute();*/

        // recuperer que l'email d'user
        //$_user = $check->fetch()['email'];

        $session_email = unserialize($_COOKIE['my_email']);
        
        
        if(!empty($_POST['email-name']))
        {
            //$sql = $bdd->prepare("UPDATE user SET email='{$email}' WHERE email={$session_email}");
            //mysqli($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

            echo "l'email est modifié <br>";
            /*
            $check->execute();
            $dbco->exec($sql);*/
        } else
        {
            echo "l'email n'est pas modifié <br>";
        }

        if (!empty($_POST['numero-name']))
        {
            $link = mysqli_connect("localhost", "root", "", "");
            echo $numero . "<br>";
            //$insert = "UPDATE user SET telephone='$numero' WHERE email='$session_email'";
            $sql = "UPDATE user SET telephone='$numero' email='$session_email'";
            if(mysqli_query($link, $sql)){
                echo "Records were updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
           /* UPDATE table
     SET fname='$fname', lname='$lname'
      WHERE email= '$user_email';*/

            /*var_dump($insert);
            $insert->execute(array(
                'telephone' => $numero,
            ));*/
        }
        if (!empty($_POST['adresse-name']))
        {
            echo $adresse . "<br>";
        } else
        {
            echo "Etape 2 else <br>";
        }
            
    }
} else
{
    echo "Etape 1 else <br>";
}

echo "Etape 0.1 <br>";
?>