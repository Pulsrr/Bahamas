<?php slot('menu_second') ?>
    <?php include_partial('fare/menuCustomer'); ?>
<?php end_slot() ?>

<div class="row">

    <div id="block_left">

         <h2>Votre réservation</h2>

<?php include_partial('reservation',array('Fare' => $Fare)) ?>

    </div>

    <div class="block_right">
        <h2>Votre réservation est confirmée</h2>
        <p>
            Un e-mail et un SMS de confirmation vous ont été adressés.<br/>
            Rappel : il n'est pas nécessaire d'appeler le moto-taxi.<br/>
            Votre réservation apparaîtra dans la rubrique <a href="<?php echo url_for('fare/index') ?>">"Mes réservations"</a>.
        </p>

        <p>
            <a target="_blank" href="<?php echo url_for('fare/pdf')?>">Imprimer la réservation</a>
        </p>

        <p>
            <a href="#">Sauvez votre réservation dans Outlook</a><br/>
            Pour insérer votre réservation dans votre calendrier Outlook: cliquez sur l'icône puis sur "ouvrir".
        </p>

        <p>
            <?php echo link_to('Annulation de la réservation', 'fare/delete?id='.$Fare->getId(), array('method' => 'delete', 'confirm' => 'Etes-vous sur(e) ? toute annulation est définitive.')) ?>
            <br/>
            Cliquez pour annuler votre réservation<br/>
            Pour modifier votre réservation vous devez l'annuler et la reprendre.
        </p>

        <p><a href="<?php echo url_for('@homepage') ?>">Prendre une autre réservation</a></p>
    </div>
</div>
