<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <?php 
            //include("../include/connexion.php");
            $id = intval($_GET['id_user']);
            if(!empty($_POST)){ 
              if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
                $nom=$_POST['nom']; 
                $email=$_POST['email']; 
                $pass=$_POST['password'];
                $pass1 = sha1($pass);
                $req="select * from users where email='$email' AND id_users!=".$id;
                $stmt = $bdd->prepare($req);
                $stmt->execute();
                $nbre = $stmt->rowCount();
                if($nbre==0)
                {
                  $sql = "UPDATE users SET nom = :nom, email = :email, password= :password WHERE id_users=".$id;
                  $req1 = $bdd->prepare($sql);
                  $req1->execute(array(
                    'nom' => $nom,
                    'email' => $email,
                    'password' => $pass1
                  ));
                  echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Modification effectuée avec succès.</div>';
                }
                else
                {
                  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cette adresse email exite déjà.</div>';
                }
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Veuillez remplir tous les champs SVP.</div>';
              }
            }
            $requete = "SELECT * FROM users WHERE id_users=".$id;
            $query = $bdd->prepare($requete);
            $query->execute();
            $row = $query->fetch();
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier un utilisateur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Entrer l'email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];}else{ echo $row['email'];}?>" required>
                </div>
                <div class="form-group">
                  <label for="nom">Nom et prénom</label>
                  <input type="text" class="form-control" name="nom" placeholder="Entrer le nom et prénom" value="<?php if(!empty($_POST['nom'])){ echo $_POST['nom'];}else{ echo $row['nom'];}?>" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Entrer le mot de passe" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
          </div>
      </div>
</div>