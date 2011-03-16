<div class="row">

<div id="block_left">

<h2 style="text-align: center">Où et quand souhaitez-vous partir ?</h2>

<?php include_partial('form', array('form' => $form)) ?>

<p>Pour un trajet supérieur à 100 km ou une mise à disposition d'un moto-taxi, veuillez renseigner <a href="#">ce formulaire</a>.</p>

</div>



<div class="block_right">
    <h2>Comment ça marche ?</h2>
    <ol style="font-size:12px;">
        <li style="margin-bottom:10px">Vous entrez le départ et l'arrivée de votre itinéraire,</li>
        <li style="margin-bottom:10px">Vous sélectionnez la date et l'heure de votre départ,</li>
        <li style="margin-bottom:10px">Vous réservez votre course en Moto Taxi <b>en quelques secondes</b>,</li>
        <li style="margin-bottom:10px">Vous recevez une <b>confirmation immédiate par email et/ou SMS</b>,</li>
        <li style="margin-bottom:10px">Vous réglez la course directement au Moto Taxi à l’arrivée.</li>
    </ol>

    <h2>Témoignages</h2>
    <table>
        <tr>
            <td rowspan="2" style="vertical-align:top">
                <?php echo image_tag("jimmym.jpg") ?>
            </td>
            <td>
                <b>Jimmy Maitre</b><br/>
                <i>Chef de projet - Net Design</i>
            </td>
        </tr>
        <tr>
            <td>
                " Rapide, simple, efficace, grâce à Allocab, j'ai pu économiser tellement de temps que je ne sais plus quoi en faire. "
            </td>
        </tr>
    </table>
<br/>
    <table>
        <tr>
            <td rowspan="2" style="vertical-align:top">
                <?php echo image_tag("jacquesm.jpg") ?>
            </td>
            <td>
                <b>Jacques-Marie Breton</b><br/>
                <i>Manager chez Cegelec</i>
            </td>
        </tr>
        <tr>
            <td>
                " Je suis toujours entre deux avions, les Moto Taxis membres du réseau Allocab ne m'ont jamais déçus. Professionnels, rapides, ponctuels, c'est un vrai bonheur. "
            </td>
        </tr>
    </table>

</div>

    <div class="clear"> </div>
</div>

<div class="row">
    <table id="argu" style="border:1px solid #aaaaaa;background:#eeeeee;">
        <tr>
            <td>
                <h2>Simple</h2>
            </td>
            <td>
                <h2>Gratuit</h2>
            </td>
            <td>
                <h2>Rapide</h2>
            </td>
            <td>
                <h2>Sécurité</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p>Définissez votre itinéraire et votre horaire, Allocab se charge de trouver un Moto Taxi pour vous.</p>
            </td>
            <td>
                <p>Réservez gratuitement depuis votre ordinateur, et bientôt depuis votre <b>téléphone mobile</b> !</p>
            </td>
            <td>
                <p><b>30 minutes</b> de l'aéroport Orly au centre de Paris : <br/>Mis à part l'hélicoptère, difficile de trouver plus rapide.</p>
            </td>
            <td>
                <p>
                    Tous nos chauffeurs sont expérimentés, et remplissent toutes les conditions légales à l'exercice du métier de Moto Taxi.
                   </p>
            </td>
        </tr>
    </table>

    <p>        
        <sup>(*)</sup> Merci de vérifier l'exactitude de votre numéro de vol ou de train. En cas de retard de votre vol ou train, aucun supplément ne vous sera facturé.
    </p>
</div>

<script>
$(window).load(function () {
  var adress_eg = "<?php echo $form->getWidgetSchema()->getHelp("start_address")?>";
  var adress2_eg = "<?php echo $form->getWidgetSchema()->getHelp("end_address")?>";
  $("#fare_request_start_address").val(adress_eg);
  $("#fare_request_end_address").val(adress2_eg);

$('#fare_request_start_address').click(function() {

    if($('#fare_request_start_address').val() == adress_eg){
        $('#fare_request_start_address').val("")
    }
});

$('#fare_request_end_address').click(function() {

    if($('#fare_request_end_address').val() == adress2_eg){
        $('#fare_request_end_address').val("")
    }
});

$('#fareForm').submit(function() {
   var error = "false";
   var a1 = $('#fare_request_start_address').val();
   var a2 = $('#fare_request_end_address').val();
   var b1 = "<?php echo $form->getWidgetSchema()->getHelp("start_address")?>";
   var b2 = "<?php echo $form->getWidgetSchema()->getHelp("end_address")?>";
  if(a1 == b1) {
      error = "true";
  }
  if(a2 == b2) {
      error = "true";
  }
  if(error == "true") {
      alert("Allocab ne lit pas (encore) dans les pensées, merci de saisir un lieu de départ et d'arrivée");
      return false;
  }
  
});

});
</script>