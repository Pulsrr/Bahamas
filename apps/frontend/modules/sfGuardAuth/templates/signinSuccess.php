<div id="block_left">
    <h2>Connexion</h2>
<?php include_partial('signinForm',array('form' => $form))?>
    <p>Mot de passe oublié ? <a href="<?php echo url_for('password/new')?>">cliquez ici</a></p>
</div>

<div class="block_right">
    <h2>Pas encore de compte ?</h2>
    <?php
    $registerForm = new DriverCustomerForm();
    include_partial('user/form',array('form'=>$registerForm));
    ?>
</div>