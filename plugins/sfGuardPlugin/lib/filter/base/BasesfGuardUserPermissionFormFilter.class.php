<?php

/**
 * sfGuardUserPermission filter form base class.
 *
 * @package    bahamas
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasesfGuardUserPermissionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserPermission';
  }

  public function getFields()
  {
    return array(
      'user_id'       => 'ForeignKey',
      'permission_id' => 'ForeignKey',
    );
  }
}
