<script>

function getGeolocation() {
// if the browser supports the w3c geo api
if(navigator.geolocation){
  // get the current position
  navigator.geolocation.getCurrentPosition(

  // if this was successful, get the latitude and longitude
  function(position){
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    $('#fare_show_lat').val(lat);
    $('#fare_show_lng').val(lon);
    $('#fare_show_geolocation').show();
  },
  // if there was an error
  function(error){
    alert('ouch');
  });
}
}
</script>

<?php use_helper('Date') ?>

<h2><?php echo format_date($Fare->getDatetime(),'HH:mm','fr_FR') ?>
    - <?php echo $Fare->getDriverCustomer()?>
    <br/>
    <a href="tel:<?php echo $Fare->getDriverCustomer()->getPhoneNumber() ?>"><?php echo $Fare->getDriverCustomer()->getPhoneNumber() ?></a>
</h2>
<p>
    <b>De :</b> <?php echo $Fare->getStartAddress() ?>
</p>
<p>
    <b>A :</b> <?php echo $Fare->getEndAddress() ?>
</p>

<?php if($Fare->getFlightNumber()) : ?>
    <p>
        <b>Numéro de vol ou train :</b> <?php echo $Fare->getFlightNumber() ?>
    </p>
<?php endif; ?>

<?php if($Fare->getSpecialRequest()) : ?>
    <p style="background:#ffffff;padding:5px;border:1px solid #aaaaaa;">
        <b>Demande du client :</b>
        <br/>
        <?php echo nl2br($Fare->getSpecialRequest()) ?>
    </p>
<?php endif; ?>


<?php if($Fare->getFinished() != 1): ?>

<form id="fare_show_geolocation" style="display:none" action="<?php echo url_for('fare/start?id='.$Fare->getId()) ?>" method="post">
<input type="hidden" value="" name="fare_show_lat" id="fare_show_lat"/>
<input type="hidden" value="" name="fare_show_lng" id="fare_show_lng"/>

    <input type="submit" value="Démarrer la course"/>
    
</form>

<script>

  getGeolocation();


</script>

<?php else: ?>
    <a href="javascript:void();" data-role="button">Course effectuée</a>
<?php endif; ?>
