<?php

/**
 * DriverAccount form base class.
 *
 * @method DriverAccount getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDriverAccountForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'driver_id'   => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => false)),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'DriverAccountCategory', 'add_empty' => false)),
      'amount'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'driver_id'   => new sfValidatorPropelChoice(array('model' => 'Driver', 'column' => 'id')),
      'category_id' => new sfValidatorPropelChoice(array('model' => 'DriverAccountCategory', 'column' => 'id')),
      'amount'      => new sfValidatorNumber(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('driver_account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DriverAccount';
  }


}
