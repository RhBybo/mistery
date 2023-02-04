<?php
require_once 'check.php'; // On inclu la connexion à la bdd

// Si les variables existent et qu'elles ne sont pas vides
if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    // Patch XSS
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $password_retype = $_POST['password_retype'];

    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
    $check = $bdd->prepare('SELECT pseudo, email, password FROM user WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
    // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
    if ($row == 0) {
        if (strlen($pseudo) <= 100) { // On verifie que la longueur du pseudo <= 100
            if (strlen($email) <= 100) { // On verifie que la longueur du mail <= 100
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Si l'email est de la bonne forme
                    if ($password === $password_retype) { // si les deux mdp saisis sont bon
                        // On hash le mot de passe avec DEFAULT, via un coût de 12
                        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                        var_dump($password_hashed);
                        // On insère dans la base de données
                        $insert = $bdd->prepare('INSERT INTO user(pseudo, email, password) VALUES(:pseudo, :email, :password)');
                        var_dump($insert);
                        $insert->execute(array(
                            'pseudo' => $pseudo,
                            'email' => $email,
                            'password' => $password_hashed,
                        ));
                        // Récupérer les données de ce client exact
                        setcookie("my_email", serialize($email), time() + (86400 * 30));
                        // On redirige avec le message de succès
                        header('Location:client-exist.php');
                        die();
                    } else {
                        header('Location: profil.php?reg_err=password');
                        die();
                    }
                } else {
                    header('Location: profil.php?reg_err=email');
                    die();
                }
            } else {
                header('Location: profil.php?reg_err=email_length');
                die();
            }
        } else {
            header('Location: profil.php?reg_err=pseudo_length');
            die();
        }
    } else {
        header('Location: profil.php?reg_err=already');
        die();
    }
}
