<?php

/**
 * DriverCustomer form base class.
 *
 * @method DriverCustomer getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDriverCustomerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'gender'              => new sfWidgetFormInputText(),
      'driver_id'           => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => true)),
      'user_id'             => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'name'                => new sfWidgetFormInputText(),
      'first_name'          => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'phone_country'       => new sfWidgetFormInputText(),
      'phone_number'        => new sfWidgetFormInputText(),
      'phone_international' => new sfWidgetFormInputText(),
      'postal_code'         => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'gender'              => new sfValidatorString(array('max_length' => 30)),
      'driver_id'           => new sfValidatorPropelChoice(array('model' => 'Driver', 'column' => 'id', 'required' => false)),
      'user_id'             => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 100)),
      'first_name'          => new sfValidatorString(array('max_length' => 100)),
      'email'               => new sfValidatorString(array('max_length' => 100)),
      'phone_country'       => new sfValidatorString(array('max_length' => 10)),
      'phone_number'        => new sfValidatorString(array('max_length' => 100)),
      'phone_international' => new sfValidatorString(array('max_length' => 110, 'required' => false)),
      'postal_code'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('driver_customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DriverCustomer';
  }


}
