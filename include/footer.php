<footer class="bg-light" style="border-top: 2px solid rgba(164,174,198,.2); padding-top: 50px;">
    <!-- /.container-card -->
    <div class="container pb-13 pb-md-15"">
        <div class=" row gy-6 gy-lg-0">
      <div class="col-md-4 col-lg-4">
        <div class="widget">
		  <address class="pe-xl-15 pe-xxl-17">MUSIQUE et PATRIMOINE A CHAMPCUEIL <br /><?php echo $resultat_adresse['adresse']; ?></address>
          <a href="mailto:musiqueetpatrimoine@gmail.com" class="link-body"><?php echo $resultat_adresse['adresse_email']; ?></a><br /> <?php echo $resultat_adresse['phone']; ?> 
          <p class="mb-4">© <script>
              document.write(new Date().getUTCFullYear());
            </script> MUSIQUE et PATRIMOINE. <br class="d-none d-lg-block" />Tous droits réservés</p>
          <nav class="nav social ">
            <a href="#"><i class="uil uil-facebook-f"></i></a>
            <a href="#"><i class="uil uil-youtube"></i></a>
          </nav>
          <!-- /.social -->
        </div>
        <!-- /.widget -->
      </div>
      <div class="col-md-4 col-lg-5">
        <div class="widget">
          <h4 class="widget-title  mb-3">Liens utiles</h4>
		  <?php 
              $req = "SELECT * FROM lien_utile ORDER BY id_lien ASC";
              $query = $bdd->prepare($req);
              $query->execute();
              $nbre = $query->rowCount();
            ?>
          <ul class="list-unstyled text-reset mb-0">
			<?php 
				while($resultat = $query->fetch()) {
				  echo "<li><a href='".$resultat['lien']."' target='_blank'>".$resultat['nom']."</a></li>";
				}
			  ?>
          </ul>
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="col-md-12 col-lg-3">
        <div class="widget">
          <h4 class="widget-title  mb-4">Notre Newsletter</h4>
          <p class="mb-5">Abonnez-vous à notre newsletter pour recevoir nos actualités.</p>
          <div class="newsletter-wrapper">
            <!-- Begin Mailchimp Signup Form -->
            <div id="mc_embed_signup2">
              <form action="#" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate " target="_blank" novalidate>
                <div id="mc_embed_signup_scroll2">
                  <div class="mc-field-group input-group form-floating">
                    <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                    <label for="mce-EMAIL2">Adresse Email</label>
                    <input type="submit" value="S'abonner" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary btn-gradient gradient-1">
                  </div>
                  <div id="mce-responses2" class="clear">
                    <div class="response" id="mce-error-response2" style="display:none"></div>
                    <div class="response" id="mce-success-response2" style="display:none"></div>
                  </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                  <div class="clear"></div>
                </div>
              </form>
            </div>
            <!--End mc_embed_signup-->
          </div>
          <!-- /.newsletter-wrapper -->
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
    </div>
    <!--/.row -->
    </div>
  </footer>
  <div id="cookie-banner" style="position: fixed; bottom: 0; width: 100%; background-color: #333; color: white; padding: 15px; text-align: center; display: none;">
		Ce site utilise des cookies pour améliorer votre expérience. En poursuivant votre navigation, vous acceptez l'utilisation de cookies.
		<button id="accept-cookies" style="margin-left: 20px; background-color: #4CAF50; color: white; border: none; padding: 10px 20px; cursor: pointer;">Accepter</button>
		<button id="refuse-cookies" style="margin-left: 10px; background-color: #f44336; color: white; border: none; padding: 10px 20px; cursor: pointer;">Refuser</button>
	</div>
	<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Vérifier si l'utilisateur a déjà accepté ou refusé les cookies
		if (!getCookie("cookiesAccepted")) {
			document.getElementById("cookie-banner").style.display = "block";
		}

		// Gestion du clic sur le bouton d'acceptation
		document.getElementById("accept-cookies").onclick = function() {
			setCookie("cookiesAccepted", "true", 365); // Le cookie expire après 365 jours
			document.getElementById("cookie-banner").style.display = "none";
		};

		// Gestion du clic sur le bouton de refus
		document.getElementById("refuse-cookies").onclick = function() {
			setCookie("cookiesAccepted", "false", 365); // Enregistre que l'utilisateur a refusé
			document.getElementById("cookie-banner").style.display = "none";
		};

		// Gestion du clic sur le bouton de paramétrage
		document.getElementById("configure-cookies").onclick = function() {
			// Ouvre une fenêtre de paramétrage ou affiche une modal
			alert("Ici, vous pouvez paramétrer vos préférences en matière de cookies.");
			// Ajouter un code pour ouvrir une modal ou une nouvelle page avec les options de cookies
		};

		// Fonction pour créer un cookie
		function setCookie(name, value, days) {
			var expires = "";
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
				expires = "; expires=" + date.toUTCString();
			}
			document.cookie = name + "=" + (value || "") + expires + "; path=/";
		}

		// Fonction pour lire un cookie
		function getCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) === ' ') c = c.substring(1, c.length);
				if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
			}
			return null;
		}
	});
</script>