<?php

/**
 * PhoneCountry filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePhoneCountryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'country' => new sfWidgetFormFilterInput(),
      'number'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'country' => new sfValidatorPass(array('required' => false)),
      'number'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('phone_country_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PhoneCountry';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'country' => 'Text',
      'number'  => 'Number',
    );
  }
}
