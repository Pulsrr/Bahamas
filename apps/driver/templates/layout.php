<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
  </head>
  <body>
      <div id="main">
	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-right">Utilisateur: <strong><a href="#"><?php include_slot('username')?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="<?php echo url_for('@sf_guard_signout') ?>" id="logout">Déconnexion</a></strong></p>

	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">

		<ul class="box f-right">
			<li><a href="#"><span><strong>Assistance &raquo;</strong></span></a></li>
		</ul>
<?php
function activeMenu($element, $sub = null) {
$module = sfContext::getInstance()->getModuleName();
    if($module == $element) {
        if($sub == null) {
            echo "id='menu-active'";
        }
        else {
            echo "id='submenu-active'";
        }
    }
}


?>
		<ul class="box">
			<li <?php activeMenu('driver'); ?>><a href="<?php echo url_for('@homepage') ?>"><span>Tableau de bord</span></a></li>
			<li <?php activeMenu('fare'); ?>><a href="<?php echo url_for('fare/index') ?>"><span>Courses</span></a></li>
			<li <?php activeMenu('customer'); ?>><a href="<?php echo url_for('customer/index') ?>"><span>Clients</span></a></li>
			<li <?php activeMenu('agenda'); ?>><a href="#"><span>Agenda</span></a></li>
			<li <?php activeMenu('accountancy'); ?>><a href="<?php echo url_for('accountancy/index') ?>"><span>Gestion</span></a></li>
			<li <?php activeMenu('settings'); ?>><a href="<?php echo url_for('settings/index') ?>"><span>Réglages</span></a></li>
		</ul>

	</div> <!-- /header -->

	<hr class="noscreen" />


	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Search -->
				<form action="#" method="get" id="search">
					<fieldset>
						<legend>Recherche</legend>

						<p><input type="text" size="17" name="" class="input-text" />&nbsp;<input type="submit" value="OK" class="input-submit-02" /><br />
						<a href="javascript:toggle('search-options');" class="ico-drop">Recherche avancée</a></p>

						<!-- Advanced search -->
						<div id="search-options" style="display:none;">

							<p>
								<label><input type="checkbox" name="" checked="checked" /> Option I.</label><br />
								<label><input type="checkbox" name="" /> Option II.</label><br />
								<label><input type="checkbox" name="" /> Option III.</label>
							</p>

						</div> <!-- /search-options -->

					</fieldset>
				</form>

				<!-- Create a new project -->
				<p id="btn-create" class="box"><a href="<?php echo url_for('customer/new') ?>"><span>Ajouter un client</span></a></p>

			</div> <!-- /padding -->

			<ul class="box">
				<li <?php activeMenu('driver', 1); ?>><a href="<?php echo url_for('@homepage') ?>">Tableau de bord</a></li>
				<li <?php activeMenu('fare', 1); ?>><a href="<?php echo url_for('fare/index') ?>">Courses</a></li>
				<li <?php activeMenu('customer', 1); ?>><a href="<?php echo url_for('customer/index') ?>">Client</a></li>
				<li <?php activeMenu('agenda', 1); ?>><a href="#">Agenda</a></li>
				<li <?php activeMenu('accountancy', 1); ?>><a href="<?php echo url_for('accountancy/index') ?>">Gestion</a></li>
				<li <?php activeMenu('settings', 1); ?>><a href="<?php echo url_for('settings/index') ?>">Réglages</a></li>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">
            <?php echo $sf_content ?>
                </div>
        </div>
      </div>
  </body>
</html>
