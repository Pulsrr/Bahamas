<?php

/**
 * FareRequest filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFareRequestFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'hash'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'start_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'flight_number' => new sfWidgetFormFilterInput(),
      'end_address'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'time'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'taxi_code'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'hash'          => new sfValidatorPass(array('required' => false)),
      'start_address' => new sfValidatorPass(array('required' => false)),
      'flight_number' => new sfValidatorPass(array('required' => false)),
      'end_address'   => new sfValidatorPass(array('required' => false)),
      'date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'time'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'taxi_code'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fare_request_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FareRequest';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'hash'          => 'Text',
      'start_address' => 'Text',
      'flight_number' => 'Text',
      'end_address'   => 'Text',
      'date'          => 'Date',
      'time'          => 'Date',
      'taxi_code'     => 'Text',
    );
  }
}
