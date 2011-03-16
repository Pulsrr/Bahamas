<?php

/**
 * PasswordRetrieve filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePasswordRetrieveFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'email'      => new sfValidatorPass(array('required' => false)),
      'token'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('password_retrieve_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PasswordRetrieve';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'email'      => 'Text',
      'token'      => 'Text',
      'created_at' => 'Date',
    );
  }
}
