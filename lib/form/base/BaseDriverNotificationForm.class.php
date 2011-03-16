<?php

/**
 * DriverNotification form base class.
 *
 * @method DriverNotification getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDriverNotificationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'driver_id'  => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => false)),
      'message'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'driver_id'  => new sfValidatorPropelChoice(array('model' => 'Driver', 'column' => 'id')),
      'message'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('driver_notification[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DriverNotification';
  }


}
