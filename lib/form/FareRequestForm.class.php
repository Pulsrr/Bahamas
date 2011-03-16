<?php

/**
 * FareRequest form.
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
class FareRequestForm extends BaseFareRequestForm
{
  public function configure()
  {
    $this->widgetSchema['start_address'] = new sfWidgetFormInput(array(
        'label' => 'Départ',
    ));

    $this->widgetSchema['taxi_code'] = new sfWidgetFormInput(array(
        'label' => 'Code Moto Taxi',
    ));

    $this->widgetSchema['flight_number'] = new sfWidgetFormInput(array(
        'label' => 'N° de Vol ou Train *',
    ));

    $this->widgetSchema['end_address'] = new sfWidgetFormInput(array(
        'label' => 'Arrivée',
    ));


$this->widgetSchema['date'] = new sfWidgetFormInput(array(
        'label' => 'Date de départ',
    ));

    $this->validatorSchema['date'] = new sfValidatorDate(array());

    $minutes = range(00,55,5);
    $mins = array();
    foreach($minutes as $minute) {
        $mins[] = str_pad($minute,2,0);
    }
    $this->widgetSchema['time'] = new sfWidgetFormTime(array(
        'label' => 'Heure de départ',
        'minutes' => array_combine($mins,$mins),
        'can_be_empty' => false
    ));

    $this->widgetSchema['hash'] = new sfWidgetFormInputHidden();


    $this->widgetSchema->setHelp('taxi_code', 'Saisissez ici le code de votre chauffeur (facultatif)');
    $this->widgetSchema->setHelp('flight_number', 'En cas de retard sur votre vol/train (facultatif)');
    $this->widgetSchema->setHelp('start_address', 'Aéroport Orly | 5 Bis rue de Verneuil, Paris');
    $this->widgetSchema->setHelp('end_address', 'Roissy Terminal 2F | Gare de Lyon, Paris');
  }
}
