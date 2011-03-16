<?php use_javascript('/sfFormExtraPlugin/js/jquery.autocompleter.js') ?>
<?php use_stylesheet('/sfFormExtraPlugin/css/jquery.autocompleter.css') ?>



<?php
    $action = $sf_params->get('action');
?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="fareRequestForm" action="<?php echo url_for('fare_request/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>


<?php echo $form->renderGlobalErrors() ?>

<div class="field">        
    <?php echo $form['start_address']->renderError() ?>
    <div class="label">
    <?php echo $form['start_address']->renderLabel() ?><?php echo $form['start_address'] ?>
    </div>
</div>

<div class="field">        
    <?php echo $form['flight_number']->renderError() ?>
    <div class="label">
    <?php echo $form['flight_number']->renderLabel() ?><?php echo $form['flight_number'] ?>
    <span class="help">
        <?php echo $form['flight_number']->renderHelp() ?>
    </span>
    </div>
</div>

<div class="field">
    <?php echo $form['date']->renderError() ?>
    <div class="label">
    <?php echo $form['date']->renderLabel() ?><?php echo $form['date'] ?>
    </div>    
</div>

<div class="field">
    <?php echo $form['time']->renderError() ?>
    <div class="label">
    <?php echo $form['time']->renderLabel() ?><?php echo $form['time'] ?>
    </div>   
</div>

<div class="field">
    <?php echo $form['end_address']->renderError() ?>
    <div class="label">    
    <?php echo $form['end_address']->renderLabel() ?><?php echo $form['end_address'] ?>
    </div>
</div>

<div class="field">
    <?php echo $form['taxi_code']->renderError() ?>
    <div class="label">    
    <?php echo $form['taxi_code']->renderLabel() ?><?php echo $form['taxi_code'] ?>
    <span class="help">
        <?php echo $form['taxi_code']->renderHelp() ?>
    </span>
    </div>
</div>
    <center>
          <?php if($action != "edit"): ?>
          <input type="submit" id="valid" value="Lancer la recherche" />
          <?php else: ?>
          <input type="submit" id="valid_inverted" value="Modifier la recherche" />
          <?php endif; ?>
    </center>

<?php echo $form->renderHiddenFields(false) ?>

</form>

  <script>
      var url = '<?php echo url_for('adress/ajax') ?>';

	function format(location) {
		return location.adress;
	}


$("#fare_request_start_address").autocomplete(url, {
		autoFill: true,
                max: 10,
		dataType: "json",
                width: 258,
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.adress,
					result: row.adress
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	})

$("#fare_request_end_address").autocomplete(url, {
		autoFill: true,
                max: 10,
		dataType: "json",
                width: 258,
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.adress,
					result: row.adress
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	})


	$(function() {
		$( "#fare_request_date" ).datepicker({
                    minDate: 0,
                    dateFormat: 'yy-mm-dd',
                    firstDay: 1,
                    dayNamesMin: [
                        'Di',
                        'Lu',
                        'Ma',
                        'Me',
                        'Je',
                        'Ve',
                        'Sa'
                    ],
                    monthNames: [
                        'Janvier',
                        'Février',
                        'Mars',
                        'Avril',
                        'Mai',
                        'Juin',
                        'Juillet',
                        'Août',
                        'Septembre',
                        'Octobre',
                        'Novembre',
                        'Décembre'
                    ]
                });
	});


  </script>