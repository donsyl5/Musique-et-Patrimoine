<aside class="col-lg-4 sidebar mt-11 mt-lg-6">
            <!--div class="widget">
              <form class="search-form">
                <div class="form-floating mb-0">
                  <input id="search-form" type="text" class="form-control" placeholder="Search">
                  <label for="search-form">Search</label>
                </div>
              </form>
            </div-->
            <div class="widget">
              <h4 class="widget-title mb-3">Derniers articles</h4>
              <ul class="image-list">
                <?php 
					$requete = "SELECT * FROM news ORDER BY id_news DESC";
					$query_req = $bdd->prepare($requete);
					$query_req->execute();
					while($resultat = $query_req->fetch()) {
						$date = $resultat['date_creation'];
						$formattedDate = date('d M Y', strtotime($date));
						echo '<li>
						  <figure class="rounded"><a href="actualite/'.$resultat['titre_bis'].'"><img src="assets/news/'.$resultat['image'].'" alt="'.$resultat['titre'].'" width="70"/></a></figure>
						  <div class="post-content">
							<h6 class="mb-2"> <a class="link-dark" href="actualite/'.$resultat['titre_bis'].'">'.$resultat['titre'].'</a> </h6>
							<ul class="post-meta">
							  <li class="post-date"><i class="uil uil-calendar-alt"></i><span>'.$formattedDate.'</span></li>
							</ul>
						  </div>
						</li>';
					}
				?>
              </ul>
              <!-- /.image-list -->
            </div>
            <div class="widget">
              <h4 class="widget-title mb-3">Tags</h4>
			  <?php 
					$tag = $resultat_id_news['tag'];
					$tag_tab = explode(',',$tag);
					$nbre_tag = count($tag_tab);
				?>
              <ul class="list-unstyled tag-list">
				<?php 
					for($i=0;$i<$nbre_tag;$i++){
						echo '<li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">'.$tag_tab[$i].'</a></li>';
					}
				?>
              </ul>
            </div>
          </aside>