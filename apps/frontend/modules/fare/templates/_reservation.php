<?php use_helper('Date') ?>
<p>
<b>Départ :</b> <?php echo $Fare->getStartAddress() ?>
</p>

<p>
<b>Date :</b> <?php echo format_date($Fare->getDateTime(),'dddd dd MMMM à HH:mm','fr_FR') ?>
</p>

<?php if($Fare->getFlightNumber()): ?>
<p>
<b>N° de vol ou train :</b> <?php echo $Fare->getFlightNumber() ?>
</p>
<?php endif; ?>

<p>
<b>Arrivée :</b> <?php echo $Fare->getEndAddress() ?>
</p>

<p>
    <b>Durée :</b> <?php echo $Fare->getDuration() ?> mn
</p>

<p>
    <b>Distance :</b> <?php echo $Fare->getDistance() ?> Km
</p>

<p>
    <b>Prix TTC :</b> <?php echo $Fare->getPriceIncludingTax() ?> €
</p>


<?php if($Fare->getSpecialRequest()): ?>

         <p><b>Demande particulière : </b><br/>
                <?php echo nl2br($Fare->getSpecialRequest()) ?></p>

<?php endif; ?>