<?php

/**
 * PasswordRetrieve form.
 *
 * @package    bahamas
 * @subpackage form
 * @author     Your name here
 */
class PasswordRetrieveForm extends BasePasswordRetrieveForm
{
  public function configure()
  {

    unset(
      $this['token'],$this['created_at']
    );

    $this->widgetSchema['email'] = new sfWidgetFormInput(array(
        'label' => 'Votre adresse email',
    ));

    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));

  }
}
