<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <div class="content-wrapper">
    <?php include 'header-menu.php'; ?>
    <!-- /header -->
    
    <!-- /section -->
   <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white" data-image-src="./assets/img/photos/bg3.jpg">
      <div class="container pt-17 pb-20 text-center" style="padding-top: 0;">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h1 class="display-1 mb-3 text-white">Contactez-nous</h1>
            <!-- /nav -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light angled upper-end">
      <div class="container pb-11">
        <div class="row mb-14 mb-md-16">
          <div class="col-xl-10 mx-auto mt-n19">
            <div class="card">
              <div class="row gx-0">
                <div class="col-lg-6 align-self-stretch">
                  <div class="map map-full rounded-top rounded-lg-start">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42295.33006853247!2d2.4035004757351297!3d48.505281817522835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5e81448450a3d%3A0xef68dc3e2307ba21!2s91750%20Champcueil%2C%20France!5e0!3m2!1sfr!2scm!4v1729186872917!5m2!1sfr!2scm" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                  <!-- /.map -->
                </div>
                <!--/column -->
                <div class="col-lg-6">
                  <div class="p-10 p-md-11 p-lg-14">
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                      </div>
                      <div class="align-self-start justify-content-start">
                        <h5 class="mb-1">Addresse</h5>
                        <address><?php echo $resultat_adresse['adresse']; ?> <br class="d-none d-md-block" />France</address>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">Téléphone</h5>
                        <p><?php echo $resultat_adresse['phone']; ?></p>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">Adresse Email</h5>
                        <p class="mb-0"><a href="mailto:<?php echo $resultat_adresse['adresse_email']; ?>" class="link-body"><?php echo $resultat_adresse['adresse_email']; ?></a></p>
                      </div>
                    </div>
                    <!--/div -->
                  </div>
                  <!--/div -->
                </div>
                <!--/column -->
              </div>
              <!--/.row -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <h2 class="display-4 mb-3 text-center">Envoyez-nous un message</h2>
            <p class="lead text-center mb-10">Contactez-nous via notre formulaire et nous vous répondrons rapidement.</p>
            <form class="contact-form needs-validation" method="post" action="./assets/php/contact.php" novalidate>
              <div class="messages"></div>
              <div class="row gx-4">
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Jane" required>
                    <label for="form_name">Nom *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter your first name. </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Doe" required>
                    <label for="form_lastname">Prénom *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter your last name. </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" required>
                    <label for="form_email">Adresse Email *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please provide a valid email address. </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Doe" required>
                    <label for="form_lastname">Sujet</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter your last name. </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <div class="form-floating mb-4">
                    <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px" required></textarea>
                    <label for="form_message">Message *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter your messsage. </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12 text-center">
                  <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Envoyez le message">
                  <p class="text-muted"><strong>*</strong> Ces champs sont obligatoires.</p>
                </div>
                <!-- /column -->
              </div>
              <!-- /.row -->
            </form>
            <!-- /form -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
</body>

</html>