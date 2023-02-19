<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>RHPC | Se connecter</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="account.css"/>
        <link rel="stylesheet" href="menu-bar.css">
        <link rel="icon" type="image/png" sizes="16x16" href="Images/Logo-RHPC.png">
    </head>

    <body>
      <header>

        <div class="navbar">
            
          <label for="myCheckbox1"><img class="Menu-Bar" src="Images/menu.png" alt="clique-pour-menu"></label>  
          <input type="checkbox" id="myCheckbox1">
                   
           <div class="menu">
            <h5 id="first"><a href="./Qui-somme-nous.html">❔Qui somme nous ?</a></h5>
            <hr class="white">
            <h5> <a href="#">🛒 Mon panier</a></h5>
            <h5> <a href="./account.html">🙂 Mon compte</a></h5>
            <label for="myCheckbox2">
              <h5>➜ Equipement sport</h5>
            </label>
            <input type="checkbox" id="myCheckbox2">           
            <div class="liste">
              <a href="./Santé&Bienetre.html">😄 Santé & Bien-Être</a>
              <a href="#">💪 Fitness et musculation</a>
              <a href="#">🏀 Sport collectif</a>
              <a href="#">🏃 Athlétisme</a>
              <a href="./FauteilDeSport.html">🪑 Fauteuil de sport</a>
              <a href="#">🏥 Matériel médicale</a>
            </div>
          <hr class="white">
            <label for="myCheckbox4">
              <h5>➜ Nos événements</h5>
            </label>
            <input type="checkbox" id="myCheckbox4">
            <div class="liste">
              <a href="#">➜ Formation</a>
              <a href="#">➜ Actualités</a>
              <a href="#">➜ Les journées handisports</a>
              <a href="#">➜ Historique</a>
            </div>    
            <hr class="white">         
              <h5>➜ Service Client</h5>
              <h5>➜ Suivre ma commande</h5>
              <h5>➜ Retour livraison</h5>
              <h5>➜ Nos partenaires</h5>
          </div>
      
          <a class="logo-rhpc" href="Page_Principale.html"><img class="logo-rhpc" src="Images/Logo-RHPC.png" alt="logo of entreprise"></a>
            <div class="search-bar">
              <table class="element-search"> 
                <tr>
                  <td>
                    <input type="text" placeholder="Recherchez un produit, un événement ..." class="search">
                  </td>
                  <td>
                    <img class="loupe" src="Images/loupe.png" alt="cherchez">
                  </td>
                </tr>
              </table>
            </div>
          

          <a href="./account.html" class="lien"><img class="account" src="Images/user.png" alt="compte">Mon compte</a>
          <a href="#" class="lien">Mon panier<img class="shop" src="Images/shopping-cart.png" alt="compte"></a>
        </div>
      </header> 


          <main>
          
          <div class="connection">
            <h1>Bienvenue !</h1>
            <hr>
            <h3>Se connecter</h3>        
          <h5>Identifiant :</h5>
            <div class="fomulaire">               
                <span class="emoji" >🙂</span> 
                <input name ="name" class = "requis" type ="text" placeholder ="Exemple : Dupond" required >
                <span class="validity"></span>
              </div>
            <h5>Mot de passe :</h5>
            <div class="fomulaire">
              <span class="emoji" >🔐</span>
              <input type="password" class="requis" name="password" minlength="8" required>
            </div>
            <input type ="submit" value ="Se connecter">
            <hr>
            <h3>Nouveau client ? </h3><h4> Cliquez  <a href="./inscription.php">ici</a></h4>
          </div>

            <?php 
                session_start();
                require_once 'config.php'; 

                if(!empty($_POST['email']) && !empty($_POST['mdp'])) 
                {
                    $email = htmlspecialchars($_POST['email']); 
                    $mdp = htmlspecialchars($_POST['mdp']);
                    
                    $email = strtolower($email);
                    

                    $check = $mysqli->prepare('SELECT pseudo, email, mdp, token FROM utilisateurs WHERE email = ?');
                    $check->execute(array($email));
                    $data = $check->fetch();
                    $row = $check->rowCount();
                    
                    if($row == 1)
                    {

                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            $mdp = hash('sha256', $mdp);
                            if($data['mdp'] === $mdp)
                            {
                                $_SESSION['user'] = $data['username'];
                                header('Location:landing.php');
                            }else header('Location:index.php?login_err=mdp');
                        }else header('Location:index.php?login_err=email');
                    }else header('Location:index.php?login_err=already');
                }else header('Location:index.php');
            ?>

              
        </main> 
  
    </body>

</html>