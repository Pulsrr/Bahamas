<?php

/**
 * fare actions.
 *
 * @package    bahamas
 * @subpackage fare
 * @author     Your name here
 */
class fareActions extends sfActions
{
  public function executeTransfer(sfWebRequest $request) {

    $Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($Fare);

    $c = new Criteria();
    $c->add(DriverPeer::ID, $Fare->getDriverId(),  Criteria::NOT_EQUAL);
    $driver = DriverPeer::doSelectOne($c);

    $Fare->setDriver($driver);
    $Fare->save();

    $this->redirect('fare/index');
 }

  public function executeValid(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($Fare);

    $Fare->setSupplement($request->getPostParameter('sup'));
    $Fare->save();

    $Fare->valid($this->getUser()->getDriver());

    $this->redirect('fare/index');
  }

  public function executeValidation(sfWebRequest $request)
  {
    $this->Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Fare);
  }

  public function executeCancel(sfWebRequest $request)
  {
    $Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($Fare);

    $Fare->delete();
    $this->redirect('fare/index');
  }

  public function executeCancelation(sfWebRequest $request)
  {
    $this->Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Fare);
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->IncomingFares = FarePeer::getIncomingFares($this->getUser()->getDriver());
    $this->PendingFares = FarePeer::getPendingFares($this->getUser()->getDriver());
    $this->DoneFares = FarePeer::getDoneFares($this->getUser()->getDriver());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Fare);

    $meteo = new GoogleWeatherAPI('paris','fr');
    $this->meteo = $meteo->getForecast();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FareForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FareForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Fare = FarePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Fare does not exist (%s).', $request->getParameter('id')));
    $this->form = new FareForm($Fare);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Fare = FarePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Fare does not exist (%s).', $request->getParameter('id')));
    $this->form = new FareForm($Fare);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Fare = FarePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Fare does not exist (%s).', $request->getParameter('id')));
    $Fare->delete();

    $this->redirect('fare/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Fare = $form->save();

      $this->redirect('fare/edit?id='.$Fare->getId());
    }
  }
}
