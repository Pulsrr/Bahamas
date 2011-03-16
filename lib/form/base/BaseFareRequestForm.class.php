<?php

/**
 * FareRequest form base class.
 *
 * @method FareRequest getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFareRequestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'hash'          => new sfWidgetFormInputText(),
      'start_address' => new sfWidgetFormInputText(),
      'flight_number' => new sfWidgetFormInputText(),
      'end_address'   => new sfWidgetFormInputText(),
      'date'          => new sfWidgetFormDate(),
      'time'          => new sfWidgetFormTime(),
      'taxi_code'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'hash'          => new sfValidatorString(array('max_length' => 255)),
      'start_address' => new sfValidatorString(array('max_length' => 255)),
      'flight_number' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'end_address'   => new sfValidatorString(array('max_length' => 255)),
      'date'          => new sfValidatorDate(),
      'time'          => new sfValidatorTime(),
      'taxi_code'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fare_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FareRequest';
  }


}
