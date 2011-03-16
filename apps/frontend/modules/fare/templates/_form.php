<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="fareForm" action="<?php echo url_for('fare/create') ?>" method="post">
<?php echo $form ?>
<center>
    <input type="submit" id="valid" value="Valider la réservation" />
</center>
</form>
