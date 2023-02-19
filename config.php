<?php
$mysqli = new PDO('mysql:host=localhost;dbname=php_exam_db;charset=utf8', 'root', '');
if(isset($_POST['envoi'])){
    if(!empty($_POST['username']) AND !empty($_POST['mdp'])){
        $username = htmlspecialchars($_POST['username']);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $mysqli->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($username, $mdp));

        if($recupUser->rowCount() > 0){
            
        }else{
            echo "Votre mot de passe ou pseudo est incorrect";
        }
    
    }else{
        echo "Veuillez compléter tout les champs";
    }

}
?>