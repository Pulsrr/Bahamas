<?php

/**
 * UserUnavailability form base class.
 *
 * @method UserUnavailability getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUserUnavailabilityForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'fare_id'       => new sfWidgetFormPropelChoice(array('model' => 'Fare', 'add_empty' => true)),
      'from_datetime' => new sfWidgetFormDateTime(),
      'to_datetime'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'       => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'fare_id'       => new sfValidatorPropelChoice(array('model' => 'Fare', 'column' => 'id', 'required' => false)),
      'from_datetime' => new sfValidatorDateTime(),
      'to_datetime'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user_unavailability[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserUnavailability';
  }


}
