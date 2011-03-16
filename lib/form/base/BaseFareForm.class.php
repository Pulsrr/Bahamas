<?php

/**
 * Fare form base class.
 *
 * @method Fare getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFareForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'hash'                => new sfWidgetFormInputText(),
      'driver_id'           => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => true)),
      'customer_id'         => new sfWidgetFormPropelChoice(array('model' => 'DriverCustomer', 'add_empty' => true)),
      'start_address'       => new sfWidgetFormInputText(),
      'flight_number'       => new sfWidgetFormInputText(),
      'start_lat'           => new sfWidgetFormInputText(),
      'start_lng'           => new sfWidgetFormInputText(),
      'end_address'         => new sfWidgetFormInputText(),
      'end_lat'             => new sfWidgetFormInputText(),
      'end_lng'             => new sfWidgetFormInputText(),
      'date'                => new sfWidgetFormDate(),
      'time'                => new sfWidgetFormTime(),
      'taxi_code'           => new sfWidgetFormInputText(),
      'datetime'            => new sfWidgetFormDateTime(),
      'duration'            => new sfWidgetFormInputText(),
      'distance'            => new sfWidgetFormInputText(),
      'real_start_lat'      => new sfWidgetFormInputText(),
      'real_start_lng'      => new sfWidgetFormInputText(),
      'real_end_lat'        => new sfWidgetFormInputText(),
      'real_end_lng'        => new sfWidgetFormInputText(),
      'real_duration'       => new sfWidgetFormInputText(),
      'real_distance'       => new sfWidgetFormInputText(),
      'price'               => new sfWidgetFormInputText(),
      'supplement'          => new sfWidgetFormInputText(),
      'vat'                 => new sfWidgetFormInputText(),
      'price_including_tax' => new sfWidgetFormInputText(),
      'confirmed'           => new sfWidgetFormInputCheckbox(),
      'valid'               => new sfWidgetFormInputCheckbox(),
      'taken'               => new sfWidgetFormInputCheckbox(),
      'finished'            => new sfWidgetFormInputCheckbox(),
      'done'                => new sfWidgetFormInputCheckbox(),
      'customer_available'  => new sfWidgetFormInputCheckbox(),
      'special_request'     => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'hash'                => new sfValidatorString(array('max_length' => 255)),
      'driver_id'           => new sfValidatorPropelChoice(array('model' => 'Driver', 'column' => 'id', 'required' => false)),
      'customer_id'         => new sfValidatorPropelChoice(array('model' => 'DriverCustomer', 'column' => 'id', 'required' => false)),
      'start_address'       => new sfValidatorString(array('max_length' => 255)),
      'flight_number'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'start_lat'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'start_lng'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'end_address'         => new sfValidatorString(array('max_length' => 255)),
      'end_lat'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'end_lng'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'date'                => new sfValidatorDate(),
      'time'                => new sfValidatorTime(),
      'taxi_code'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'datetime'            => new sfValidatorDateTime(array('required' => false)),
      'duration'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'distance'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'real_start_lat'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'real_start_lng'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'real_end_lat'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'real_end_lng'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'real_duration'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'real_distance'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'price'               => new sfValidatorNumber(array('required' => false)),
      'supplement'          => new sfValidatorNumber(array('required' => false)),
      'vat'                 => new sfValidatorNumber(array('required' => false)),
      'price_including_tax' => new sfValidatorNumber(array('required' => false)),
      'confirmed'           => new sfValidatorBoolean(array('required' => false)),
      'valid'               => new sfValidatorBoolean(array('required' => false)),
      'taken'               => new sfValidatorBoolean(array('required' => false)),
      'finished'            => new sfValidatorBoolean(array('required' => false)),
      'done'                => new sfValidatorBoolean(array('required' => false)),
      'customer_available'  => new sfValidatorBoolean(array('required' => false)),
      'special_request'     => new sfValidatorString(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fare[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fare';
  }


}
