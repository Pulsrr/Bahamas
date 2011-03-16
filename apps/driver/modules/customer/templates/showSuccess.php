<?php use_helper('Date') ?>

<h1>Fiche Client</h1>

<h2 class="tit"><?php echo $DriverCustomer->getName() ?></h2>

<div class="col33">
    <table class="nostyle">
        <tr>
            <th>Nom : </th>
            <td><?php echo $DriverCustomer->getName() ?></td>
        </tr>
        <tr>
            <th>Prénom : </th>
            <td><?php echo $DriverCustomer->getFirstName() ?></td>
        </tr>
        <tr>
            <th>Email : </th>
            <td><?php echo $DriverCustomer->getEmail() ?></td>
        </tr>
        <tr>
            <th>Téléphone : </th>
            <td><?php echo $DriverCustomer->getPhone() ?></td>
        </tr>
    </table>
</div>

<div class="col66">
    <?php include_partial('fare/list',array('Fares' => $DriverCustomer->getFares())) ?>
</div>