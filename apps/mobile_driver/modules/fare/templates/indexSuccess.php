<?php use_helper('Date') ?>


<ul data-role="listview">
    <li data-role="list-divider">Courses du jour</li>
<?php foreach($Fares as $Fare):?>
    <li>
        <h3>
            <a href="<?php echo url_for('fare/show?id='.$Fare->getId()) ?>"><?php echo format_date($Fare->getDatetime(),'HH:mm','fr_FR') ?></a>
            - <?php echo $Fare->getDriverCustomer() ?>
        </h3>
        <p>
            De : <?php echo $Fare->getStartAddress() ?><br/>
            A : De : <?php echo $Fare->getEndAddress() ?>
        </p>
    </li>
<?php    endforeach; ?>
<?php if(count($Fares) < 1): ?>
    <li><h3>Il n'y a aucune course aujourd'hui</h3></li>
<?php endif; ?>
</ul>
