<?php use_helper('Date') ?>
<table width="100%">
        <tr>
            <th>#</th>
            <th>Jour</th>
            <th>Heure</th>
            <th>Client</th>
            <th>Départ</th>
            <th>Arrivée</th>
        </tr>
        <?php foreach($Fares as $Fare): ?>
        <tr>
            <td><a href="<?php echo url_for('fare/show?id='.$Fare->getId()) ?>"><?php echo $Fare->getId() ?></a></td>
            <td><?php echo format_date($Fare->getDate(),'d','fr_FR') ?></td>
            <td><?php echo $Fare->getTime('H:i') ?></td>
            <td><a href="<?php echo url_for('customer/show?id='.$Fare->getDriverCustomer()->getId()) ?>"><?php echo $Fare->getDriverCustomer()->getName() ?></a></td>
            <td><?php echo $Fare->getStartAddress() ?></td>
            <td><?php echo $Fare->getEndAddress() ?></td>
        </tr>
        <?php endforeach; ?>
        <?php if(count($Fares) < 1 ): ?>
        <tr>
            <td colspan="5">Aucune course</td>
        </tr>
        <?php endif; ?>

    </table>