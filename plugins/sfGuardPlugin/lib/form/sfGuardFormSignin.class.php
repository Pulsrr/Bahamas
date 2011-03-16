<?php

class sfGuardFormSignin extends BasesfGuardFormSignin
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(array(
          'label' => 'eMail'
      )),
      'password' => new sfWidgetFormInput(array(
          'type' => 'password',
          'label' => 'Mot de passe'
      )),
      'remember' => new sfWidgetFormInputCheckbox(array(
          'label' => 'Se souvenir de moi'
      )),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(),
      'password' => new sfValidatorString(),
      'remember' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser());

    $this->widgetSchema->setNameFormat('signin[%s]');
  }
}
