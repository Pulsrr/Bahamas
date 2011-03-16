<?php slot('menu_second') ?>
    <?php include_partial('fare_request/menuSteps'); ?>
<?php end_slot() ?>

<div class="row">
    <div id="block_left">

         <h2>Votre réservation</h2>

<?php include_partial('reservation',array('Fare' => $Fare)) ?>

    </div>

    <div class="block_right">
        <?php if($Fare->getDriver()): ?>
        <h2>Un moto taxi est disponible</h2>


<?php if(!$sf_user->isAuthenticated()): ?>
    <div id="signinForm">
        <h3>Connexion</h3>
        <?php include_partial('sfGuardAuth/signinForm',array('form' => $signinForm)) ?>
        <p>Vous avez perdu votre mot de passe : <a href="<?php echo url_for('password/new')?>" target="_blank">cliquez ici</a></p>
        <p>Vous n'avez pas encore de compte Allocab ? : <a href="javascript:void()" id="register">cliquez ici</a></p>
    </div>
    <div id="registerForm">
        <h3>Inscription</h3>
        <p>(si vous êtes déjà inscrit, identifiez-vous en <a href="javascript:void()" id="signin">cliquant ici</a>)</p>
        <p><b>Pour terminer votre réservation,<br/>merci de renseigner le formulaire suivant :</b></p>
        <?php include_partial('user/form',array('form' => $registerForm)) ?>
    </div>
    <p>En cliquant sur « Terminer la réservation », vous acceptez les <a href="">Conditions Générales d'Utilisation</a>.</p>
<?php else: ?>
    <h3>Vos coordonnées</h3>
    <p>Pour terminer votre réservation, merci de vérifier les données suivantes :</p>
    <table>
        <tr>
            <th>Nom, Prénom : </th>
            <td>
                <?php echo $sf_user->getCustomer()->getName() ?>
                <?php echo $sf_user->getCustomer()->getFirstName() ?>
            </td>
        </tr>
        <tr>
            <th>Téléphone : </th>
            <td>
                <?php echo $sf_user->getCustomer()->getPhoneNumber() ?>
            </td>
        </tr>
        <tr>
            <th>e-mail : </th>
            <td><?php echo $sf_user->getCustomer()->getEmail() ?></td>
        </tr>
    </table>

    <br/><br/>
    <center>
        <?php echo link_to('Terminer la réservation', 'fare/confirm?id='.$Fare->getId(), array('method' => 'post','id' => 'valid')) ?>
    </center>
    <br/><br/>
<?php endif; ?>


        <?php else: ?>
        <h2>Tous nos moto-taxis sont réservés à l’horaire indiqué</h2>
        <?php endif; ?>
    </div>
</div>

<script>
$(window).load(function () {
  $("#signinForm").hide();

  $('#signin').click(function() {
    $("#registerForm").hide();
    $("#signinForm").show();
});

  $('#register').click(function() {
    $("#signinForm").hide();
    $("#registerForm").show();
});


});


</script>
