<?php

/**
 * user actions.
 *
 * @package    bahamas
 * @subpackage user
 * @author     Your name here
 */
class userActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(DriverPeer::TAXI_CODE, $this->getUser()->getAttribute('taxi_code'));
    $driver = DriverPeer::doSelectOne($c);

    $customer = new DriverCustomer();
    if($driver) {
    $customer->setDriver($driver);
    }
    $this->form = new DriverCustomerForm($customer);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DriverCustomerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $DriverCustomer = $form->save();

      $url = $this->getUser()->getAttribute('referer');

      $account = $DriverCustomer->getsfGuardUser();
      $this->getUser()->signin($account);

      $this->redirect($url);
    }
  }
}
