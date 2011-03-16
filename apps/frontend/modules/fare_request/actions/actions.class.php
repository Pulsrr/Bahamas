<?php

/**
 * fare_request actions.
 *
 * @package    bahamas
 * @subpackage fare_request
 * @author     Your name here
 */
class fare_requestActions extends sfActions
{


  public function executeNew(sfWebRequest $request)
  {
    $this->getUser()->getAttributeHolder()->remove('referer');
    $hash = sha1(Tools::random(25));
    $this->getUser()->getAttributeHolder()->remove('hash');


    $fareRequest = new FareRequest();
    $fareRequest->setDate(time());
    $fareRequest->setTime(time()+(3600*2));
    $fareRequest->setHash($hash);
    $this->form = new FareRequestForm($fareRequest);

    $this->signinForm = new sfGuardFormSignin();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $hash = $request->getPostParameter('fare_request[hash]');
    $this->getUser()->setAttribute('hash', $hash);

    $this->form = new FareRequestForm();    

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $hash = $this->getUser()->getAttribute('hash');
    $this->forward404Unless($FareRequest = FareRequestPeer::retrieveByHash($hash));

    $hash = sha1(Tools::random(25));
    
    $newFareRequest = new FareRequest();
    $newFareRequest->setStartAddress($FareRequest->getStartAddress());
    $newFareRequest->setEndAddress($FareRequest->getEndAddress());
    $newFareRequest->setDate($FareRequest->getDate());
    $newFareRequest->setTime($FareRequest->getTime());
    $newFareRequest->setFlightNumber($FareRequest->getFlightNumber());
    $newFareRequest->setTaxiCode($FareRequest->getTaxiCode());
    $newFareRequest->setHash($hash);

    $this->form = new FareRequestForm($newFareRequest);

    $fare = new Fare();
    $fare->setTime($FareRequest->getTime());
    $fare->setDate($FareRequest->getDate());
    $fare->setFlightNumber($FareRequest->getFlightNumber());
    $fare->setTaxiCode($FareRequest->getTaxiCode());
    $fare->setHash($this->getUser()->getAttribute('hash'));
    if($this->getUser()->isAuthenticated()) {
        $fare->setCustomerId($this->getUser()->getCustomer()->getId());
    }
    $this->fareForm = new FareForm($fare);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $hash = $this->getUser()->getAttribute('hash');
    $this->forward404Unless($FareRequest = FareRequestPeer::retrieveByHash($hash));
    $this->form = new FareRequestForm($FareRequest);

    $this->processForm($request, $this->form);

    $fare = new Fare();
    $fare->setTime($FareRequest->getTime());
    $fare->setDate($FareRequest->getDate());
    $fare->setFlightNumber($FareRequest->getFlightNumber());
    $fare->setTaxiCode($FareRequest->getTaxiCode());
    $fare->setHash($FareRequest->getHash());
    if($this->getUser()->isAuthenticated()) {
        $fare->setCustomerId($this->getUser()->getCustomer()->getId());
    }
    $this->fareForm = new FareForm($fare);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $FareRequest = $form->save();

      $this->getUser()->setAttribute('taxi_code', $FareRequest->getTaxiCode());

      $this->redirect('fare_request/edit');
    }
  }
}
