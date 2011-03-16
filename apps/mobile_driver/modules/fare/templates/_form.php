<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="fareForm" action="<?php echo url_for('fare/valid?id='.$form->getObject()->getId()) ?>" method="post">
    <div style="display:none">
        <?php echo $form ?>
    </div>
<input style="float:right" type="submit" id="valid" value="Valider" />
</form>
