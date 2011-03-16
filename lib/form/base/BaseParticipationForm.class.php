<?php

/**
 * Participation form base class.
 *
 * @method Participation getObject() Returns the current form's model object
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseParticipationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'driver_id'  => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => false)),
      'fare_id'    => new sfWidgetFormPropelChoice(array('model' => 'Fare', 'add_empty' => false)),
      'amount'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'driver_id'  => new sfValidatorPropelChoice(array('model' => 'Driver', 'column' => 'id')),
      'fare_id'    => new sfValidatorPropelChoice(array('model' => 'Fare', 'column' => 'id')),
      'amount'     => new sfValidatorNumber(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('participation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Participation';
  }


}
