<script>
window.onload = function(){
$('#sup').blur(function() {
  var sup = $('#sup').val();

  if(sup == ""){
      sup = 0;
      $('#sup').val(0);
  }

  var total = parseFloat($('#pc').html())+parseFloat($('#km').html())+parseFloat(sup);
  var tva = total*5.5/100;
  $('#ttc').html(total);
  $('#tva').html(tva);
  $('#ht').html(total - tva);
});
}
</script>

<h1>Validation de la course #<?php echo $Fare->getId() ?></h1>

<h2>Veuillez confirmer les informations ci-dessous</h2>


<div class="col33">
<form method="post" action="<?php echo url_for('fare/valid?id='.$Fare->getId()) ?>">
    <table class="nostyle">
        <tr>
            <th>Prise en charge : </th>
            <td id="pc" style="text-align:right">20</td>
            <td>€</td>
        </tr>
        <tr>
            <th>Kilométrage : </th>
            <td id="km" style="text-align:right"><?php echo $Fare->getDistanceBy() * 2?></td>
            <td>€</td>
        </tr>
        <tr>
            <th>Supplément : </th>
            <td><input name="supplement" id="sup" type="text" style="text-align:right;width:70px"/></td>
            <td>€</td>
        </tr>
        <tr>
            <th>Total TTC : </th>
            <td id="ttc" style="text-align:right"><?php echo $Fare->getPriceIncludingTax()?></td>
            <td>€</td>
        </tr>
        <tr>
            <th>Dont TVA 5,5 % : </th>
            <td id="tva" style="text-align:right"><?php echo $Fare->getVat() ?></td>
            <td>€</td>
        </tr>
        <tr>
            <th>Total HT : </th>
            <td id="ht" style="text-align:right"><?php echo $Fare->getPrice() ?></td>
            <td>€</td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="Valider"/></td>
        </tr>
    </table>
</div>

    
    
</form>
    


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


