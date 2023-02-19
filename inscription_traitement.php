<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp_retype']))
    {
        // Patch XSS
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $mdp_retype = htmlspecialchars($_POST['mdp_retype']);

        $check = $mysqli->prepare('SELECT username, email, mdp FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0)
        {
            if(strlen($username) <= 100)
            {
                if(strlen($email) <= 100)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if($mdp == $mdp_retype)
                        {
                            $mdp = hash('sha256', $mdp);

                            $insert = $mysqli->prepare('INSERT INTO User(username, mdp, email) VALUES(:username, :mdp, :email)');
                            $insert->execute(array(
                                'username' => $username,
                                'mdp' => $mdp,
                                'email' => $email 
                            ));
                            header('Location:inscription.php?reg_err=success');
                        }else header('Location: inscription.php?reg_err=mdp');
                    }else header('Location: inscription.php?reg_err=email');
                }else header('Location: inscription.php?reg_err=email_length');
            }else header('Location: inscription.php?reg_err=username_length');
        }else header('Location: inscription.php?reg_err=already');
    }