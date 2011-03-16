<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>



<script type="text/javascript">

  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

  function calcRoute() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var myOptions = {
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas_fare"), myOptions);
    directionsDisplay.setMap(map);

    var start_lat = <?php echo $Fare->getStartLat()?>;
    var start_lng = <?php echo $Fare->getStartLng()?>;
    var end_lat = <?php echo $Fare->getEndLat()?>;
    var end_lng = <?php echo $Fare->getEndLng()?>;

    var start = new google.maps.LatLng(start_lat, start_lng);
    var end = new google.maps.LatLng(end_lat, end_lng);
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
        var distance = Math.round(response.routes[0].legs[0].distance.value/1000);
        var old_distance = <?php echo $Fare->getDistance()?>;

        directionsDisplay.setDirections(response);

        var duration = Math.round(response.routes[0].legs[0].duration.value/60);
        var start_address = response.routes[0].legs[0].start_address;
        var end_address = response.routes[0].legs[0].end_address;

        var ecart = Math.abs(distance - old_distance);

        if(ecart > 2) {
            $('#fare_ecart').show();
            $('#fare_ecart_size').html(ecart+' Km');
        }
        else {
            distance = old_distance;
        }
        $('#fare_stop_start_address').html(start_address);
        $('#fare_stop_end_address').html(end_address);
        $('#fare_stop_distance').html(distance+' Km');
        $('#fare_stop_duration').html(duration+' mn');
        $('#fare_stop_price').html(distance*2+20+' €');

        $('#fare_start_address').val(start_address);
        $('#fare_end_address').val(end_address);
        $('#fare_start_lat').val(parseFloat(start_location[0]));
        $('#fare_start_lng').val(parseFloat(start_location[1]));
        $('#fare_end_lat').val(parseFloat(end_location[0]));
        $('#fare_end_lng').val(parseFloat(end_location[1]));
        $('#fare_distance').val(distance);
        $('#fare_duration').val(duration);
      }

    });
  }

</script>

<div id="map_canvas_fare" style="height:100px;"> </div>
<br/>

<p>
    <b>De :</b>
    <span id="fare_stop_start_address"></span>
</p>
<p>
    <b>A :</b>
    <span id="fare_stop_end_address"></span>
</p>
<p>
    <b>Distance :</b>
    <span id="fare_stop_distance"></span>
</p>
<p>
    <b>Durée :</b>
    <span id="fare_stop_duration"></span>
</p>
<p>
    <b>Prix :</b>
    <span id="fare_stop_price"></span>
</p>


<p id="fare_ecart" style="background:#ffffff;border:1px solid #aaaaaa;padding:5px;display:none;">
    L'écart entre le trajet réservé et le trajet effectué est de <span id="fare_ecart_size" style="font-weight:bold"></span>.<br/>
    Le prix est donc modifié par rapport au montant indiqué lors de la réservation.
</p>

<?php include_partial('form',array('form' => $form)) ?>


<script>
    calcRoute();
</script>
