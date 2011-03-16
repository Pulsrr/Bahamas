<?php

/**
 * Fare form.
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
class DirectionForm extends BaseFareForm
{
  public function configure()
  {
    unset(
      $this['created_at'], $this['taken'],
      $this['done'],$this['customer_available'],$this['driver_available'],
      $this['price'], $this['supplement'],
      $this['vat'], $this['price_including_tax'],
      $this['customer_id'], $this['driver_id'], $this['valid']
    );

    $this->widgetSchema['start_lat'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['start_lng'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['end_lat'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['end_lng'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['duration'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['distance'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['datetime'] = new sfWidgetFormInputHidden();

    $this->widgetSchema['start_address'] = new sfWidgetFormInput(array(
        'label' => 'Départ',
    ));

    $this->widgetSchema['flight_number'] = new sfWidgetFormInput(array(
        'label' => 'N° de Vol ou Train',
    ));

    $this->widgetSchema['end_address'] = new sfWidgetFormInput(array(
        'label' => 'Arrivée',
    ));
    $years = range(2011,2013);
    $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
        'label' => 'Jour du départ',
        'config' => '{
            minDate: new Date(),
    }',
    ));
    $this->validatorSchema['date'] = new sfValidatorDate(array(

    ));

    $minutes = range(00,55,5);
    $this->widgetSchema['time'] = new sfWidgetFormTime(array(
        'label' => 'Heure de départ',
        'minutes' => array_combine($minutes,$minutes),
        'can_be_empty' => false
    ));

    $this->widgetSchema->setNameFormat('direction[%s]');


  }
}
