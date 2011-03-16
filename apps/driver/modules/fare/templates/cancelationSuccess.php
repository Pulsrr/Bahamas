<h1>Annulation de la course #<?php echo $Fare->getId() ?></h1>



<div class="col33">

    <p>Merci de renseigner les raisons de la suppression de la course</p>


<form method="post" action="<?php echo url_for('fare/cancel?id='.$Fare->getId()) ?>">

    <label><input type="radio" name="reason1"/> Le client a annulé sa course</label>
    <br/>
    <label><input type="radio" name="reason2"/> Le client ne s'est pas présenté</label>
<p>
    Commentaires :<br/>
    <textarea></textarea>
</p>

<input type="submit" value="Confirmer l'annulation" />
</form>
</div>


<div class="col66">
    <table class="nostyle">
        <tr>
            <th>Date : </th>
            <td><?php echo $Fare->getDate() ?></td>
        </tr>
        <tr>
            <th>Heure : </th>
            <td><?php echo $Fare->getTime() ?></td>
        </tr>
        <tr>
            <th>Départ : </th>
            <td><?php echo $Fare->getStartAddress() ?></td>
        </tr>
        <tr>
            <th>Arrivée : </th>
            <td><?php echo $Fare->getEndAddress() ?></td>
        </tr>
    </table>
</div>


