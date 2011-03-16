<?php if($sf_user->hasCredential('driver')) {
    $sf_user->signOut();
}
$module = $sf_params->get('module');
$action = $sf_params->get('action');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <div id="page">
          <div id="menu_auth">
          <ul>
            <?php if($sf_user->isAuthenticated()): ?>
            <li><a href="<?php echo url_for('@sf_guard_signout') ?>">Déconnexion</a></li>
            <li><a href="<?php echo url_for('fare/index') ?>">Mon compte</a></li>
            <?php else: ?>
            <li><a href="<?php echo url_for('@sf_guard_signin') ?>">Connexion</a></li>
            <?php endif; ?>
        </ul>
              <div class="clear"> </div>
          </div>
      <div id="main">
        <h1 style="margin-top:0;width:218px;display:inline;float:left"><a href="<?php echo url_for('@homepage') ?>"><?php echo image_tag('logo_allocab.jpg','alt=Allocab - Réservez gratuitement votre mototaxi en ligne title=Allocab - Réservez gratuitement votre mototaxi en ligne')?></a></h1>
        <ul id="menu_top">
            <li><a <?php if($module == "fare_request" ){ echo "class='active'"; }?> href="<?php echo url_for('@homepage') ?>">Particuliers</a></li>
            <li><a <?php if($module == "page" && $action == "driver"){ echo "class='active'"; }?> href="<?php echo url_for('page/driver') ?>">Moto Taxis</a></li>
            <li><a <?php if($module == "page" && $action == "pro"){ echo "class='active'"; }?> href="<?php echo url_for('page/pro') ?>">Entreprises</a></li>
        </ul>        

        <div class="clear"> </div>

        <?php if (!include_slot('menu_second')): ?>
        <ul id="menu_second">
            <li><a href="<?php echo url_for('@homepage') ?>">Réserver votre Moto Taxi</a></li>
            <li><a href="">Le service</a></li>
            <li><a href="">Equipement et sécurité</a></li>
            <li><a href="">Tarifs et réservation</a></li>
        </ul>
        <?php endif; ?>

        <div id="content">
            <?php echo $sf_content ?>
            <div class="clear"> </div>
        </div>

        <div id="footer">
            <a href="">Qui sommes nous</a> |
            <a href="<?php echo url_for('page/cgv') ?>">Mentions légales</a> |
            <a href="">Nous contacter</a> |
            Allocab.com est une société par actions simplfiée au capital de 6 000 €, RCS Bobigny située au 249, avenue du Président Wilson - 93 210 La Plaine Saint Denis. Numéro SIREN :  - Numéro Siret :  - Numéro T.V.A intercommunautaire :
        </div>

      </div>

      </div>
  </body>
</html>
