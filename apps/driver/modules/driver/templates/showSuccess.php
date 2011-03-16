<?php slot('username') ?>
    <?php echo $Driver->getName() ?>
<?php end_slot() ?>
<h1>Tableau de bord</h1>

<div class="col66">
    <h2 class="tit">Synthèse gestion (Février 2011)</h2>
    <table width="100%">
        <tr>
            <th width="40%">Chiffre d'affaires</th>
            <td>2 500 €</td>
        </tr>
        <tr>
            <th>Nombre de courses</th>
            <td>70</td>
        </tr>
        <tr>
            <th>Avoir Allocab</th>
            <td>550 €</td>
        </tr>
        <tr>
            <th>Créance Allocab</th>
            <td>100 €</td>
        </tr>
        <tr>
            <th>Bénéfice</th>
            <td>2 950 €</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right"><a href="#">Plus de détail</a></td>
        </tr>
    </table>
</div>

<div class="col33 center">
    <h2 class="tit">Notifications</h2>
    <ul>
        <li><a href="">Course #91 :</a> nouvelle prime</li>
        <li><a href="">Course #22 :</a> avis client</li>
        <li><a href="">Course #45 :</a> plainte client</li>
        <li><a href="">Course #22 :</a> nouvelle prime</li>
    </ul>
    <a href="#">Voir toutes les notifications</a>
</div>

<div class="clear"> </div>

    <h2 class="tit">Courses à venir</h2>
<?php include_partial('fare/list',array('Fares' => $IncomingFares)) ?>

    <h2 class="tit">Courses passées non traitées</h2>
<?php include_partial('fare/list',array('Fares' => $PendingFares)) ?>
