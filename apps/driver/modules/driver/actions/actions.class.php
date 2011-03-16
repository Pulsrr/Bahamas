<?php

/**
 * driver actions.
 *
 * @package    bahamas
 * @subpackage driver
 * @author     Your name here
 */
class driverActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
    $this->Driver = $this->getUser()->getDriver();
    $this->forward404Unless($this->Driver);

    $this->IncomingFares = FarePeer::getIncomingFares($this->Driver);
    $this->PendingFares = FarePeer::getPendingFares($this->Driver);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Driver = $this->getUser()->getDriver(), sprintf('Object Driver does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverForm($Driver);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Driver = $this->getUser()->getDriver(), sprintf('Object Driver does not exist (%s).', $request->getParameter('id')));
    $this->form = new DriverForm($Driver);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Driver = $form->save();

      $this->redirect('driver/show?id='.$Driver->getId());
    }
  }
}
