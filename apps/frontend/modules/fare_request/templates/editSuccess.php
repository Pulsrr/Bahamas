<?php slot('menu_second') ?>
    <?php include_partial('fare_request/menuSteps'); ?>
<?php end_slot() ?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

function calcDistance(lat_a, lon_a, lat_b, lon_b)  {
    a = Math.PI / 180;
    lat1 = lat_a * a;
    lat2 = lat_b * a;
    lon1 = lon_a * a;
    lon2 = lon_b * a;
    t1 = Math.sin(lat1) * Math.sin(lat2);
    t2 = Math.cos(lat1) * Math.cos(lat2);
    t3 = Math.cos(lon1 - lon2);
    t4 = t2 * t3;
    t5 = t1 + t4;
    rad_dist = Math.atan(-t5/Math.sqrt(-t5 * t5 +1)) + 2 * Math.atan(1);
    return (rad_dist * 3437.74677 * 1.1508) * 1.6093470878864446;
}
  

  function calcRoute() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var myOptions = {
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
    var start = document.getElementById("fare_request_start_address").value;
    var end = document.getElementById("fare_request_end_address").value;
    var request = {
        origin:start,
        destination:end,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {       

        var start_location = response.routes[0].legs[0].start_location.toString();
        start_location = start_location.replace(new RegExp("[()]","g"),"");
        start_location = start_location.split(", ");

        var end_location = response.routes[0].legs[0].end_location.toString();
        end_location = end_location.replace(new RegExp("[()]","g"),"");
        end_location = end_location.split(", ");

        var a = calcDistance(48.85667,2.3509900000000243,start_location[0],start_location[1]);
        var b = calcDistance(48.85667,2.3509900000000243,end_location[0],end_location[1]);
        var distance = Math.round(response.routes[0].legs[0].distance.value/1000);

        if(a > 100 || b > 100){
            $('#map').hide();
            $('#fare').hide();
            $('#too_far').show();
        }
        else if(distance <= 1) {
            $('#map').hide();
            $('#fare').hide();
            $('#too_short').show();
        }
        else {
        $('#map').show();

        directionsDisplay.setDirections(response);

        var duration = Math.round(response.routes[0].legs[0].duration.value/60);
        var start_address = response.routes[0].legs[0].start_address;
        var end_address = response.routes[0].legs[0].end_address;

        $('#start_adress').html(start_address);
        $('#end_adress').html(end_address);
        $('#distance').html(distance+' km');
        $('#duration').html(duration+' mn');
        $('#price').html(distance*2+22.5+' €');

        $('#fare_start_address').val(start_address);
        $('#fare_end_address').val(end_address);
        $('#fare_start_lat').val(parseFloat(start_location[0]));
        $('#fare_start_lng').val(parseFloat(start_location[1]));
        $('#fare_end_lat').val(parseFloat(end_location[0]));
        $('#fare_end_lng').val(parseFloat(end_location[1]));
        $('#fare_distance').val(distance);
        $('#fare_duration').val(duration);

        $('#fare').show('slow');

        }

      }
      else {
          $('#map').hide();
          $('#error').show();
      }
    });
  }
</script>

<div class="row">

<div id="block_left">

<h2 style="text-align: center">Où et quand souhaitez-vous partir ?</h2>

<?php include_partial('form', array('form' => $form)) ?>
</div>

<div class="block_right" id="too_short" style="display:none">
    <h2>Un peu court non ?</h2>
    <p>
        Dans le cadre de l'opération "Manger, bouger" Allocab ne vous permets pas de réserver des courses de moins d'1 Km.
    </p>
    <p>
        C'est notre contribution à la santé de l'humanité.
    </p>
    <p>
        30 minutes de marche par jour, c'est l'assurance de devenir aussi "good-looking" que notre CEO.
    </p>
    <p>
        <img src="http://www.gravatar.com/avatar/a08a52e0af3243084be708bcb279980f?s=100&r=g" /> <- notre CEO
    </p>
</div>

<div class="block_right" id="too_far" style="display:none">
    <h2>Votre itinéraire se situe dans une zone qui n'est pas encore desservie</h2>
    <p>
       Allocab vous permet de réserver un moto taxi à Paris et sa banlieue.
    </p>
    <p>
        Nous vous prions de bien vouloir nous excuser pour le désagrément.<br/>
        Nous mettons en œuvre tous les moyens nécessaires pour améliorer au quotidien l'étendue géographique de nos services.
    </p>
    <p>
        Pour une demande particulière, vous pouvez remplir une demande de mise à disposition en renseignant <a href="">ce formulaire</a>.
    </p>
</div>

<div class="block_right" id="error" style="display:none">
    <h2>L'itinéraire est incorrect</h2>
    <p>Nous ne pouvons trouver un intinéraire pour les points de départ et d'arrivée que vous avez saisis.
    <br/>Merci de corriger les informations dans le formulaire ci-contre.
    </p>
</div>

<div class="block_right" id="fare" style="display:none">
    <h2>Votre réservation</h2>
    <table id="resume">
        <tr>
            <th>Départ : </th>
            <td><h3 id="start_adress"></h3></td>
        </tr>
        <tr>
            <th>Arrivée : </th>
            <td><h3 id="end_adress"></h3></td>
        </tr>
        <tr>
            <th>Durée : </th>
            <td><h3 id="duration"></h3></td>
        </tr>
        <tr>
            <th>Distance : </th>
            <td><h3 id="distance"></h3></td>
        </tr>
        <tr>
            <th>Prix : </th>
            <td><h3 id="price"></h3></td>
        </tr>
    </table>
    <?php include_partial('fare/form',array('form' => $fareForm)) ?>

</div>

    <div class="clear"> </div>
</div>

<div class="row" id="map" style="border-top:1px solid #aaaaaa">

    <p>L'itinéraire final est laissé à l'appréciation du chauffeur en fonction des aléas de la circulation et de vos recommandations.<br/>
Le prix est majoré en cas de retard du client. Pour plus d'informations, veuillez consulter nos <a href="">conditions générales d'utilisations</a>.</p>
    <div id="map_canvas" style="height:400px;"> </div>
    <div class="clear"> </div>

</div>

<script>
$(window).load(function () {
  calcRoute();
});
</script>