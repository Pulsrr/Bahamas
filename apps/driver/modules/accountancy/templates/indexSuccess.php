<?php
$total_in = 0;
$total_out = 0;
$solde = 0;
?>

<h1>Gestion</h1>

<div class="col66">
<h2 class="tit">Journal</h2>

<table width="100%">
    <tr>
        <th>Date</th>
        <th>Libellé</th>
        <th>Entrée</th>
        <th>Sortie</th>
    </tr>
    <?php foreach($Accounts as $Account): ?>
    <tr>
        <td><?php echo $Account->getCreatedAt() ?></td>
        <td><?php echo $Account->getDriverAccountCategory()->getName() ?></td>
        <td><?php if($Account->getAmount() > 0):?>
                <?php echo $Account->getAmount() ?>
                <?php $total_in = $total_in+$Account->getAmount(); ?>
            <?php endif; ?>
        </td>
        <td><?php if($Account->getAmount() < 0):?>
                <?php echo $Account->getAmount() ?>
                <?php $total_out = $total_out+$Account->getAmount(); ?>
            <?php endif; ?>
        </td>
    </tr>
    <?php $solde = $solde+$Account->getAmount(); ?>
    <?php endforeach; ?>
    <tr>
        <td colspan="2">Total : </td>
        <td><?php echo $total_in ?></td>
        <td><?php echo $total_out ?></td>
    </tr>
    <tr>
        <td colspan="2">Solde : </td>
        <td colspan="2"><?php echo $solde ?></td>
    </tr>
</table>
</div>

<div class="col33 center">
    <h2>Primes reçues</h2>
    Total : <?php echo $countPrimesIn?> €
    <table class="notyle" width="100%">
        <tr>
            <th>Course</th>
            <th>Client</th>
            <th>Montant</th>
        </tr>
    <?php foreach($PrimesIn as $Prime): ?>
        <tr>
            <td>#<?php echo $Prime->getFare()->getId()?></td>
            <td><?php echo $Prime->getFare()->getDriverCustomer()->getName() ?></td>
            <td><?php echo $Prime->getAmount()?> €</td>
        </tr>
    <?php endforeach; ?>
    </table>


    <h2>Primes versées</h2>
    Total : <?php echo $countPrimesOut?> €
    <table class="notyle" width="100%">
        <tr>
            <th>Course</th>
            <th>Client</th>
            <th>Montant</th>
        </tr>
    <?php foreach($PrimesOut as $Prime): ?>
        <tr>
            <td>#<?php echo $Prime->getFare()->getId()?></td>
            <td><?php echo $Prime->getFare()->getDriverCustomer()->getName() ?></td>
            <td><?php echo $Prime->getAmount()?> €</td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>