Pour ajouter des liens de partage vers les réseaux sociaux sur les articles de votre site PHP, vous pouvez suivre ces étapes :

1. Identifier les URL des articles
Chaque article de votre site doit avoir une URL unique. Assurez-vous d'utiliser des URL propres et bien formatées.

Exemple :

php
Copier le code
$article_url = "https://www.votre-site.com/article.php?id=" . $article_id;
2. Créer les URL de partage pour les réseaux sociaux
Les plateformes sociales utilisent des paramètres spécifiques dans leurs URL de partage. Voici quelques exemples :

Facebook
php
Copier le code
$facebook_url = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($article_url);
Twitter
php
Copier le code
$twitter_url = "https://twitter.com/intent/tweet?url=" . urlencode($article_url) . "&text=" . urlencode($article_title);
LinkedIn
php
Copier le code
$linkedin_url = "https://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($article_url) . "&title=" . urlencode($article_title);
WhatsApp
php
Copier le code
$whatsapp_url = "https://api.whatsapp.com/send?text=" . urlencode($article_title . " " . $article_url);
3. Créer les boutons de partage dans le HTML
Ajoutez des boutons ou des liens qui utilisent ces URL dans votre page article.

Exemple :

html
Copier le code
<div class="share-buttons">
    <a href="<?= $facebook_url ?>" target="_blank" class="btn btn-facebook">Partager sur Facebook</a>
    <a href="<?= $twitter_url ?>" target="_blank" class="btn btn-twitter">Partager sur Twitter</a>
    <a href="<?= $linkedin_url ?>" target="_blank" class="btn btn-linkedin">Partager sur LinkedIn</a>
    <a href="<?= $whatsapp_url ?>" target="_blank" class="btn btn-whatsapp">Partager sur WhatsApp</a>
</div>
4. Ajouter du style (optionnel)
Vous pouvez styliser ces boutons avec CSS ou utiliser des bibliothèques comme Font Awesome pour des icônes.

Exemple CSS :

css
Copier le code
.btn {
    display: inline-block;
    padding: 10px 15px;
    margin: 5px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
}
.btn-facebook { background-color: #3b5998; }
.btn-twitter { background-color: #1da1f2; }
.btn-linkedin { background-color: #0077b5; }
.btn-whatsapp { background-color: #25d366; }
5. Tester
Assurez-vous que les liens redirigent correctement et que les métadonnées des articles (titre, description, image) apparaissent bien sur les plateformes. Cela nécessite des balises Open Graph et Twitter Cards.

Exemple pour Open Graph (dans le <head> de votre page) :

html
Copier le code
<meta property="og:title" content="<?= $article_title ?>" />
<meta property="og:description" content="<?= $article_description ?>" />
<meta property="og:image" content="<?= $article_image ?>" />
<meta property="og:url" content="<?= $article_url ?>" />
<meta property="og:type" content="article" />