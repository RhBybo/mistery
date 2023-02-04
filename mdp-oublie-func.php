<?php
session_start();

if ( empty($_POST['mdp-oublie-btn']) ) {

    $email = $_GET['email'];
    // afficher le résultat
    echo '<h3>Informations récupérées en utilisant GET</h3>'; 
    echo 'Email : ' . $email . ' <br>yes 1<br>';
    
    $db = new PDO('mysql: host=localhost;dbname=myfirstdb;', 'root', '');

    $sql = "SELECT email FROM user WHERE email='$email'";
    $result = $db->prepare($sql);
    $result->execute();

    foreach ($result as $results)
    {
        $results =  implode(" ", $results);
	    $results = substr($results, 0, strrpos($results, ' '));
		echo "Vos coordonnées sont " . $results . ".";
    }

    if($email == $results)
    {
        ?>
        <input type="password" name="password" placeholder="Ecrivez un nouveau mot de passe" required="required" autocomplete="off">
        <button type="submit" value="ajout" name="ajout">Changer le Mdp</button>
        <?php
        $password = htmlspecialchars($_POST['password']);
        if(strlen($password) <= 8){
            ?>
                <button type="submit" value="ajout" name="ajout">Changer le Mdp</button>
            <?php
        }
        if ( empty($_POST['ajout']) ) {
            echo "yes 3";
        } else {
            echo "no 3";
        }
    }  else{ 
        //header('Location: mdp-oublie.php?mdp_err=already'); die();
        echo "no 2";
    }

    //exit;
} else {
    echo "no 1";
}