<?php

/**
 * DriverCustomer filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDriverCustomerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'gender'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'driver_id'           => new sfWidgetFormPropelChoice(array('model' => 'Driver', 'add_empty' => true)),
      'user_id'             => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'name'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'first_name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone_country'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone_number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone_international' => new sfWidgetFormFilterInput(),
      'postal_code'         => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'gender'              => new sfValidatorPass(array('required' => false)),
      'driver_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Driver', 'column' => 'id')),
      'user_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'name'                => new sfValidatorPass(array('required' => false)),
      'first_name'          => new sfValidatorPass(array('required' => false)),
      'email'               => new sfValidatorPass(array('required' => false)),
      'phone_country'       => new sfValidatorPass(array('required' => false)),
      'phone_number'        => new sfValidatorPass(array('required' => false)),
      'phone_international' => new sfValidatorPass(array('required' => false)),
      'postal_code'         => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('driver_customer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DriverCustomer';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'gender'              => 'Text',
      'driver_id'           => 'ForeignKey',
      'user_id'             => 'ForeignKey',
      'name'                => 'Text',
      'first_name'          => 'Text',
      'email'               => 'Text',
      'phone_country'       => 'Text',
      'phone_number'        => 'Text',
      'phone_international' => 'Text',
      'postal_code'         => 'Text',
      'created_at'          => 'Date',
    );
  }
}
