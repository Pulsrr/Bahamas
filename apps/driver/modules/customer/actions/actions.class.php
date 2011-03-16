<?php

/**
 * customer actions.
 *
 * @package    bahamas
 * @subpackage customer
 * @author     Your name here
 */
class customerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(DriverCustomerPeer::DRIVER_ID, $this->getUser()->getDriver()->getId());
    $this->DriverCustomers = DriverCustomerPeer::doSelect($c);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->DriverCustomer = DriverCustomerPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->DriverCustomer);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DriverCustomerForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DriverCustomerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($DriverCustomer = DriverCustomerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object DriverCustomer does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverCustomerForm($DriverCustomer);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($DriverCustomer = DriverCustomerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object DriverCustomer does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverCustomerForm($DriverCustomer);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($DriverCustomer = DriverCustomerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object DriverCustomer does not exist (%s).', $request->getParameter('id')));
    $DriverCustomer->delete();

    $this->redirect('customer/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $DriverCustomer = $form->save();

      $this->redirect('customer/edit?id='.$DriverCustomer->getId());
    }
  }
}
