<?php

/**
 * Driver filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDriverFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'name'       => new sfWidgetFormFilterInput(),
      'first_name' => new sfWidgetFormFilterInput(),
      'email'      => new sfWidgetFormFilterInput(),
      'phone'      => new sfWidgetFormFilterInput(),
      'taxi_code'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hq'         => new sfWidgetFormFilterInput(),
      'hq_lat'     => new sfWidgetFormFilterInput(),
      'hq_lng'     => new sfWidgetFormFilterInput(),
      'hq_area'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'name'       => new sfValidatorPass(array('required' => false)),
      'first_name' => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'phone'      => new sfValidatorPass(array('required' => false)),
      'taxi_code'  => new sfValidatorPass(array('required' => false)),
      'hq'         => new sfValidatorPass(array('required' => false)),
      'hq_lat'     => new sfValidatorPass(array('required' => false)),
      'hq_lng'     => new sfValidatorPass(array('required' => false)),
      'hq_area'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('driver_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Driver';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'user_id'    => 'ForeignKey',
      'name'       => 'Text',
      'first_name' => 'Text',
      'email'      => 'Text',
      'phone'      => 'Text',
      'taxi_code'  => 'Text',
      'hq'         => 'Text',
      'hq_lat'     => 'Text',
      'hq_lng'     => 'Text',
      'hq_area'    => 'Number',
      'created_at' => 'Date',
    );
  }
}
