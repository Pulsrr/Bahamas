<?php use_helper('Date') ?>

<?php slot('menu_second') ?>
    <?php include_partial('fare/menuCustomer'); ?>
<?php end_slot() ?>

<h1>Mes réservations en cours</h1>

<?php if($sf_user->hasFlash('notice')): ?>
<div class="notice"><?php echo html_entity_decode($sf_user->getFlash('notice')) ?></div>
<?php endif; ?>

<div class="block_right orange" style="margin-bottom:10px;width:30%;padding:10px;">
    <h2>Votre compte</h2>
    <b><?php echo $sf_user->getCustomer()->getFirstName() ?> <?php echo $sf_user->getCustomer()->getName() ?></b><br/>
    <?php echo $sf_user->getCustomer()->getEmail() ?><br/>
    <?php echo $sf_user->getCustomer()->getPhoneNumber() ?>
</div>



<?php foreach($Fares as $Fare): ?>
<div class="fare grey">
    <table>
        <tr>
            <td colspan="1">
                <b><?php echo format_date($Fare->getDateTime(),'dddd dd MMMM à HH:mm','fr_FR') ?></b>
                avec <?php echo $Fare->getDriver()->getName() ?>
            </td>
            <td class="info" rowspan="3"><?php echo $Fare->getDistance() ?> Km</td>
            <td class="info" rowspan="3"><?php echo $Fare->getDuration() ?> mn</td>
            <td class="info" rowspan="3"><?php echo $Fare->getPriceIncludingTax() ?> €</td>
        </tr>
        <tr>
            <td class="start_adress"><?php echo $Fare->getStartAddress() ?></td>
        </tr>
        <tr>
            <td class="end_adress">
                <?php echo $Fare->getEndAddress() ?>
            </td>
        </tr>
    </table>
</div>
<?php endforeach; ?>