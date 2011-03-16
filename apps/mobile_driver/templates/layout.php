<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-startup-image" href="<?php echo sfConfig::get('sf_web_dir')?>/images/splash-mobile-driver.png" />
    <link rel="apple-touch-icon" href="<?php echo sfConfig::get('sf_web_dir')?>/images/allocab-icon.png"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo sfConfig::get('sf_web_dir')?>/images/allocab-icon.png"/>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css" />
<script src="http://code.jquery.com/jquery-1.5.min.js"></script>

<script>
$(document).bind("mobileinit", function(){
  $.mobile.ajaxEnabled = false;
});
</script>

<script src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js"></script>
  </head>
  <body>
    <div data-role="page">
        <div data-role="header">
            <h1>Allocab</h1>
        </div>

        <div data-role="content">
            <?php echo $sf_content ?>
        </div>

        <div data-role="footer" data-position="fixed">
            <div data-role="navbar">
		<ul>
			<li><a href="a.html">Géo<br/>localisation</a></li>
			<li><a href="b.html">Nouvelle<br/>course</a></li>
                        <li><a href="b.html">Se mettre<br/>indisponible</a></li>
		</ul>
            </div>
        </div>
    </div>
  </body>
</html>
