<?php 
  session_start();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Musique et Patrimoine - Administration</title>    
        <link rel="stylesheet" href="css/style.css">   
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  </head>
  <body>
    <hgroup>
      <h1>Musique et Patrimoine - Administration</h1>
      <h3>Bien vouloir vous connecter</h3>
    </hgroup>
    <div class="row">       
      <div class="container" style="text-align: center;"> 
        <?php 
          include("include/connexion.php");
          if(!empty($_POST))
          { if(!empty($_POST['email']) AND !empty($_POST['password']))
            {
              $email=$_POST['email']; 
              $pass=$_POST['password'];
              $pass1 = sha1($pass);
              $stmt = $bdd->prepare("SELECT * FROM users WHERE email='$email' AND password='$pass1'");
              $stmt->execute();
              $nbre = $stmt->rowCount();
              $stmt->setFetchMode(PDO::FETCH_OBJ);
              $resultat = $stmt->fetch();
              if($nbre > 0){
                $_SESSION['email']=$resultat->email;
                $_SESSION['nom']=$resultat->nom;
                $_SESSION['date_creation']=$resultat->date_creation;
                $_SESSION['id']=$resultat->id_users;
                $bdd->exec("UPDATE users SET connect=1 WHERE email='$email'");
                echo "<script language='Javascript'>
                 <!--
                 document.location.href='dashboard.php';
                 // -->
                  </script>"; return;
                $stmt->closeCursor();
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Vos paramètres de connexion sont erronés</div>';
              }
            }
            else
            {
              echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Veuillez remplir tous les champs SVP.</div>';
            }
          }
        ?>
        </div>
      </div>
    <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <div class="group">
        <input type="email" name="email" required /><span class="highlight"></span><span class="bar"></span>
        <label>Email</label>
      </div>
      <div class="group">
        <input type="password" name="password" required><span class="highlight"></span><span class="bar"></span>
        <label>Mot de passe</label>
      </div>
      <input type="submit" class="button buttonBlue" value="Se connecter" />
        <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
    </form>
    <footer>
      <p>By <a href="http://www.donsyl.com" target="_blank">Donsyl</a></p>
    </footer>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
  </body>
</html>
