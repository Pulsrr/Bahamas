<?php

/**
 * Participation filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseParticipationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'driver_id'  => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => true)),
      'fare_id'    => new sfWidgetFormPropelChoice(array('model' => 'Fare', 'add_empty' => true)),
      'amount'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'driver_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Driver', 'column' => 'id')),
      'fare_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Fare', 'column' => 'id')),
      'amount'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('participation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Participation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'driver_id'  => 'ForeignKey',
      'fare_id'    => 'ForeignKey',
      'amount'     => 'Number',
      'created_at' => 'Date',
    );
  }
}
