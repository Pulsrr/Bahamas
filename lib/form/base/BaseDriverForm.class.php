<?php

/**
 * Driver form base class.
 *
 * @method Driver getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDriverForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'name'       => new sfWidgetFormInputText(),
      'first_name' => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'taxi_code'  => new sfWidgetFormInputText(),
      'hq'         => new sfWidgetFormInputText(),
      'hq_lat'     => new sfWidgetFormInputText(),
      'hq_lng'     => new sfWidgetFormInputText(),
      'hq_area'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'name'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'first_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'phone'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'taxi_code'  => new sfValidatorString(array('max_length' => 50)),
      'hq'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'hq_lat'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'hq_lng'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'hq_area'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('driver[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Driver';
  }


}
