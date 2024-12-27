<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <?php 
            //include("../include/connexion.php");
            if(!empty($_POST))
            { if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['password']))
              {
                $nom=$_POST['nom'];
                $email=$_POST['email']; 
                $pass=$_POST['password'];
                $pass1 = sha1($pass);
                $req="select * from users where email='$email'"; 
                $query = $bdd->prepare($req);
                $query->execute();
                $nbre = $query->rowCount();
                if($nbre==0)
                {
                  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $date = date("Y-m-d H:i:s");
                    $req = $bdd->prepare('INSERT INTO users(nom,email, password, date_creation) VALUES(:nom, :email, :password, :date_creation)');
                    $req->execute(array(
                      'nom' => $nom,
                      'email' => $email,
                      'password' => $pass1,
                      'date_creation' => $date
                    ));
                    echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> utilisateur créé avec succès.</div>';
                  }else{
                    echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Please type a valid email adress.</div>';
                  }
                }
                else
                {
                  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> This adress email already exists.</div>';
                }
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Veuillez remplir tous les champs SVP.</div>';
              }
            }
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Créer un nouvel utilisateur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Entrer l'email" required>
                </div>
                <div class="form-group">
                  <label for="nom">Nom et prénom</label>
                  <input type="text" class="form-control" name="nom" placeholder="Entrer le nom et prénom" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Entrer le mot de passe" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </form>
          </div>
      </div>
</div>