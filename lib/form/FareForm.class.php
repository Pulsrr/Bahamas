<?php

/**
 * Fare form.
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
class FareForm extends BaseFareForm
{
  public function configure()
  {
    unset(
      $this['created_at'], $this['taken'],
      $this['done'],$this['customer_available'],$this['driver_available'],
      $this['price'], $this['supplement'],
      $this['vat'], $this['price_including_tax'],
      $this['driver_id'], $this['valid'], $this['confirmed'],
      $this['real_start_address'], $this['real_end_address'],
      $this['real_start_lat'], $this['real_start_lng'],
      $this['real_end_lat'], $this['real_end_lng'],
      $this['real_distance'], $this['real_duration'],$this['finished']

    );

    $this->widgetSchema['special_request'] = new sfWidgetFormTextarea(array(
        'label' => 'Demande particulière à l\'intention du moto-taxi :',
    ));

    $this->widgetSchema['start_lat'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['start_lng'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['end_lat'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['end_lng'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['duration'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['distance'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['datetime'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['start_address'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['end_address'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['flight_number'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['taxi_code'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['datetime'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['time'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['date'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['customer_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['hash'] = new sfWidgetFormInputHidden();

  }
}
