<?php

/**
 * Fare filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFareFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'hash'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'driver_id'           => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => true)),
      'customer_id'         => new sfWidgetFormPropelChoice(array('model' => 'DriverCustomer', 'add_empty' => true)),
      'start_address'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'flight_number'       => new sfWidgetFormFilterInput(),
      'start_lat'           => new sfWidgetFormFilterInput(),
      'start_lng'           => new sfWidgetFormFilterInput(),
      'end_address'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'end_lat'             => new sfWidgetFormFilterInput(),
      'end_lng'             => new sfWidgetFormFilterInput(),
      'date'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'time'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'taxi_code'           => new sfWidgetFormFilterInput(),
      'datetime'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'duration'            => new sfWidgetFormFilterInput(),
      'distance'            => new sfWidgetFormFilterInput(),
      'real_start_lat'      => new sfWidgetFormFilterInput(),
      'real_start_lng'      => new sfWidgetFormFilterInput(),
      'real_end_lat'        => new sfWidgetFormFilterInput(),
      'real_end_lng'        => new sfWidgetFormFilterInput(),
      'real_duration'       => new sfWidgetFormFilterInput(),
      'real_distance'       => new sfWidgetFormFilterInput(),
      'price'               => new sfWidgetFormFilterInput(),
      'supplement'          => new sfWidgetFormFilterInput(),
      'vat'                 => new sfWidgetFormFilterInput(),
      'price_including_tax' => new sfWidgetFormFilterInput(),
      'confirmed'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'valid'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'taken'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'finished'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'done'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'customer_available'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'special_request'     => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'hash'                => new sfValidatorPass(array('required' => false)),
      'driver_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Driver', 'column' => 'id')),
      'customer_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DriverCustomer', 'column' => 'id')),
      'start_address'       => new sfValidatorPass(array('required' => false)),
      'flight_number'       => new sfValidatorPass(array('required' => false)),
      'start_lat'           => new sfValidatorPass(array('required' => false)),
      'start_lng'           => new sfValidatorPass(array('required' => false)),
      'end_address'         => new sfValidatorPass(array('required' => false)),
      'end_lat'             => new sfValidatorPass(array('required' => false)),
      'end_lng'             => new sfValidatorPass(array('required' => false)),
      'date'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'time'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'taxi_code'           => new sfValidatorPass(array('required' => false)),
      'datetime'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'duration'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'distance'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'real_start_lat'      => new sfValidatorPass(array('required' => false)),
      'real_start_lng'      => new sfValidatorPass(array('required' => false)),
      'real_end_lat'        => new sfValidatorPass(array('required' => false)),
      'real_end_lng'        => new sfValidatorPass(array('required' => false)),
      'real_duration'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'real_distance'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'supplement'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'vat'                 => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'price_including_tax' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'confirmed'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'valid'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'taken'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'finished'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'done'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'customer_available'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'special_request'     => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('fare_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fare';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'hash'                => 'Text',
      'driver_id'           => 'ForeignKey',
      'customer_id'         => 'ForeignKey',
      'start_address'       => 'Text',
      'flight_number'       => 'Text',
      'start_lat'           => 'Text',
      'start_lng'           => 'Text',
      'end_address'         => 'Text',
      'end_lat'             => 'Text',
      'end_lng'             => 'Text',
      'date'                => 'Date',
      'time'                => 'Date',
      'taxi_code'           => 'Text',
      'datetime'            => 'Date',
      'duration'            => 'Number',
      'distance'            => 'Number',
      'real_start_lat'      => 'Text',
      'real_start_lng'      => 'Text',
      'real_end_lat'        => 'Text',
      'real_end_lng'        => 'Text',
      'real_duration'       => 'Number',
      'real_distance'       => 'Number',
      'price'               => 'Number',
      'supplement'          => 'Number',
      'vat'                 => 'Number',
      'price_including_tax' => 'Number',
      'confirmed'           => 'Boolean',
      'valid'               => 'Boolean',
      'taken'               => 'Boolean',
      'finished'            => 'Boolean',
      'done'                => 'Boolean',
      'customer_available'  => 'Boolean',
      'special_request'     => 'Text',
      'created_at'          => 'Date',
    );
  }
}
