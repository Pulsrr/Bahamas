<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 

<script>
function calcRoute() {

var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

  directionsDisplay = new google.maps.DirectionsRenderer();
  var myOptions = {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  directionsDisplay.setMap(map);


  var start = "<?php echo $Fare->getStartAddress() ?>";
  var end = "<?php echo $Fare->getEndAddress() ?>";
  var request = {
    origin:start,
    destination:end,
    travelMode: google.maps.DirectionsTravelMode.DRIVING
  };
  directionsService.route(request, function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(result);
    }
  });
}
</script>


<h1>Course #<?php echo $Fare->getId()?></h1>

<h2 class="tit">Détails</h2>

<?php if($Fare->getDone() != 1): ?>
<?php if($Fare->isIncoming()): ?>
<a class="button transfert" href="<?php echo url_for('fare/transfer?id='.$Fare->getId()) ?>">Tansférer la course</a>
<?php else: ?>
<a class="button valid" href="<?php echo url_for('fare/validation?id='.$Fare->getId()) ?>">Valider la course</a>
<?php endif; ?>
<?php if($Fare->isPending()): ?>
<a class="button cancel" href="<?php echo url_for('fare/cancelation?id='.$Fare->getId()) ?>">Annuler la course</a>
<?php endif; ?>
<?php endif; ?>

<div class="clear"> </div>

<div class="col66">
    <h3>Départ</h3>
    <table class="nostyle">
        <tr>
            <th>Client : </th>
            <td><?php echo $Fare->getDriverCustomer()->getName() ?></td>
        </tr>
        <tr>
            <th>Date et heure : </th>
            <td><?php echo $Fare->getDate() ?> à <?php echo $Fare->getTime() ?></td>
        </tr>
        <tr>
            <th>Adresse : </th>
            <td><?php echo $Fare->getStartAddress() ?></td>
        </tr>
    </table>


    <h3>Arrivée</h3>
    <table class="nostyle">
        <tr>
            <th>Heure d'arrivée : </th>
            <td><?php echo $Fare->getDate() ?> à <?php echo $Fare->getTime()+2 ?></td>
        </tr>
        <tr>
            <th>Adresse : </th>
            <td><?php echo $Fare->getEndAddress() ?></td>
        </tr>
    </table>
</div>

<div class="col33">
    <h3>Trajet</h3>
    <table class="nostyle">
        <tr>
            <th>Durée estimée : </th>
            <td><?php echo $Fare->getDurationBy() ?> mn</td>
        </tr>
        <tr>
            <th>Distance : </th>
            <td><?php echo $Fare->getDistanceBy() ?> km</td>
        </tr>
        <tr>
            <th>Prix estimé : </th>
            <td><?php echo $Fare->getPriceIncludingTax()?> €</td>
        </tr>
        <tr>
            <th>Météo : </th>
            <td>
                <img src="<?php echo$meteo[0]['icon']; ?>"/><br/>
                <?php echo$meteo[0]['low']; ?>°C | <?php echo$meteo[0]['high']; ?>°C
            </td>
        </tr>
    </table>
</div>

<div class="clear"> </div>

<h2 class="tit">Plan</h2>
<div style="height:400px;width:100%;margin-bottom:15px" id="map_canvas"> </div>

<script>
    window.onload = function(){
        calcRoute();
}
</script>