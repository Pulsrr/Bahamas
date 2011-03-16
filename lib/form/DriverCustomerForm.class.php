<?php

/**
 * DriverCustomer form.
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
class DriverCustomerForm extends BaseDriverCustomerForm
{
  public function configure()
  {
    unset(
      $this['created_at'], $this['phone_international']
    );

    $this->widgetSchema['driver_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();

$this->widgetSchema['gender'] = new sfWidgetFormChoice(array(
  'choices'  => DriverCustomerPeer::$genders,
  'expanded' => true,
  'label' => ' ',
));

$this->widgetSchema['phone_country'] = new sfWidgetFormChoice(array(
  'choices'  => DriverCustomerPeer::$phone_countries,
  'label' => 'Pays',
));

    $this->widgetSchema['name'] = new sfWidgetFormInput(array(
        'label' => 'Nom',
    ));

    $this->widgetSchema['first_name'] = new sfWidgetFormInput(array(
        'label' => 'Prénom',
    ));

        $this->widgetSchema['phone_number'] = new sfWidgetFormInput(array(
        'label' => 'N° Téléphone mobile',
    ));

        $this->widgetSchema['postal_code'] = new sfWidgetFormInput(array(
        'label' => 'Code Postal',
    ));

    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));


    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DriverCustomer', 'column' => array('email')))
    );

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DriverCustomer', 'column' => array('phone_number')))
    );

    $this->widgetSchema->setHelp('postal_code', '(facultatif)');
    $this->widgetSchema->setHelp('phone_number', 'Ex : 06 34 67 98 76');

    

  }
}
