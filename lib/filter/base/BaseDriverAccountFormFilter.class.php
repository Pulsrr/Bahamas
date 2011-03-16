<?php

/**
 * DriverAccount filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDriverAccountFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'driver_id'   => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => true)),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'DriverAccountCategory', 'add_empty' => true)),
      'amount'      => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'driver_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Driver', 'column' => 'id')),
      'category_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DriverAccountCategory', 'column' => 'id')),
      'amount'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('driver_account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DriverAccount';
  }

  public function getFields()
  {
    return array(
      'driver_id'   => 'ForeignKey',
      'category_id' => 'ForeignKey',
      'amount'      => 'Number',
      'created_at'  => 'Date',
      'id'          => 'Number',
    );
  }
}
