<?php

session_start(); // Démarrage de la session
//require_once 'check.php'; // On inclut la connexion à la base de données

// Vérifier si le formulaire est soumis 
//if (empty($_POST['connexionBtn'])) {
$email = $_POST['emailCon'];
$password = $_POST['password2'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
var_dump($hashed_password);

// afficher le résultat
echo '<h3>Information from _GET</h3>';
echo 'Email : ' . $email . '<br> password : ' . $password . '<br>';

$db = new PDO('mysql: host=localhost;dbname=myfirstdb;', 'root', '');

$sql = "SELECT * FROM user WHERE email='$email'";
$result = $db->prepare($sql);
$result->execute();
$test_pass = $result->fetch()['password'];

if ($result->rowCount() > 0) {
    $_user = $result->fetch()['password'];
    echo "<br>$ user Password is : " . $_user;
    echo "<br>";
    echo "$ password is : " . $password;
    echo "<br>";

    if (password_verify($password, $test_pass)) {
        echo "Your password is the same.";
        $_SESSION['email'] = $email;
        // Supprimer l'ancien cookie
        setcookie("my_email", "", time() - (86400 * 30));
        // Créer un nouveau cookie
        setcookie("my_email", serialize($email), time() + (86400 * 30));
        header('Location:client-exist.php');
    } else {
        echo "Your password isn't the same.";
        header('Location: profil.php?login_err=password');
        die();
    }
} else {
    header('Location: profil.php?login_err=already');
    die();
}


    //exit;
/*} else {
    echo "On dirait t + nul que j'pensais:(";
}
*/

    

    //mysql->close();
/*
    if(isset($_POST['emailCon']) && isset($_POST['passwordCon']))  // Si il existe les champs email, password et qu'ils ne sont pas vident
    {       

        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        // Si > à 0 alors l'utilisateur existe
        if($row == 1)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['user'] = $data['pseudo'];
                    header('Location:my-page.php');
                    die();
                }else{ header('Location: profil.php?login_err=password'); die(); }
            }else{ header('Location: profil.php?login_err=email'); die(); }
        }else{ header('Location: index.php?login_err=already'); die(); }
    }else{ header('Location: men.html'); echo "non mec"; die(); } // si le formulaire est envoyé sans aucune données
*/