<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>RHPC | Créer un compte</title>
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

        <body>
          <main>
            <div class="login-form">
              <?php
                  if(isset($_GET['reg_err']))
                  {
                      $err = htmlspecialchars($_GET['reg_err']);

                      switch($err)
                      {
                          case 'success':
                          ?>
                              <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie!
                              </div>
                          <?php
                          break;

                          case 'mdp':
                            ?>
                                <div class="alert alert-success">
                                  <strong>Erreur</strong> mot de passe différent
                                </div>
                            <?php
                          break;

                          case 'email':
                            ?>
                                <div class="alert alert-success">
                                  <strong>Erreur</strong> email non valide
                                </div>
                            <?php
                          break;
                          
                          case 'already':
                            ?>
                                <div class="alert alert-success">
                                  <strong>Erreur</strong> compte déjà existant
                                </div>
                            <?php
                          break;
                      }
                  }
              ?>
              <form action="inscription_traitement.php" method="post">
              <h1>Bienvenue !</h1>
                <hr>
                <h2>S'inscirire</h2>
                
                <h5>Username :</h5>
                <div class="form-group">
                  <span class="emoji" ></span>
                  <input name ="Pseudo" class= "form-control" type ="text" placeholder ="Username" required="required" autocomplete="off">
                </div>
                <h5>Email :</h5>
                  <div class="form-group">
                    <input name ="Email" class= "form-control" type ="email" placeholder ="Email" required="required" autocomplete="off">
                    <span class="validity"></span>
                  </div>
                  <h5>Mot de passe :</h5>
                    <div class="form-group">
                      <input name ="Mot de passe" class= "form-control" type ="mdp" placeholder ="Mot de passe" required="required" autocomplete="off">
                    </div>
                    <h5>Re-tapez le mot de passe :</h5>
                      <div class="form-group">
                        <input type="mdp" name="mdp_retype" class="form-control" placeholder="Confirmer" required="required" autocomplete="off">
                      </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="envoie">Inscription</button>
                    </div>
                    <hr>
                  </div>
              </form>
            </div>       
          </main> 
        </body>
    </html>