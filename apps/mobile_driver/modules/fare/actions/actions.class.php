<?php

/**
 * fare actions.
 *
 * @package    bahamas
 * @subpackage fare
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fareActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeIndex(sfWebRequest $request)
  {
      $driver = $this->getUser()->getDriver();
      $c = new Criteria();
      $c->add(FarePeer::DRIVER_ID, $driver->getId());
      $c->add(FarePeer::CONFIRMED, 1);
      $c->add(FarePeer::FINISHED, 0);
      $c->addAscendingOrderByColumn(FarePeer::DATETIME);
      $this->Fares = FarePeer::doSelect($c);

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $driver = $this->getUser()->getDriver();
    $this->forward404Unless($this->Fare);
    $this->redirectIf($this->Fare->getDriverId() != $driver->getId(), 'sfGuardAuth/secure');
  }

  public function executeStart(sfWebRequest $request)
  {
    $Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $driver = $this->getUser()->getDriver();
    $this->forward404Unless($Fare);
    $this->redirectIf($Fare->getDriverId() != $driver->getId(), 'sfGuardAuth/secure');

        $Fare->setTaken(1);
        $Fare->setStartLat($request->getPostParameter('fare_show_lat'));
        $Fare->setStartLng($request->getPostParameter('fare_show_lng'));
        $Fare->save();

    $this->Fare = $Fare;
  }


  public function executeEnd(sfWebRequest $request)
  {
    $this->Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $driver = $this->getUser()->getDriver();
    $this->forward404Unless($this->Fare);
    $this->redirectIf($this->Fare->getDriverId() != $driver->getId(), 'sfGuardAuth/secure');

  }


  public function executeStop(sfWebRequest $request)
  {
    $Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $driver = $this->getUser()->getDriver();
    $this->forward404Unless($Fare);
    $this->redirectIf($Fare->getDriverId() != $driver->getId(), 'sfGuardAuth/secure');

    $this->form = new FareForm($Fare);

    $Fare->setEndLat($request->getPostParameter('fare_end_lat'));
    $Fare->setEndLng($request->getPostParameter('fare_end_lng'));
    $Fare->save();

    $this->Fare = $Fare;

  }

  public function executeValid(sfWebRequest $request)
  {
    $Fare = FarePeer::retrieveByPk($request->getParameter('id'));
    $driver = $this->getUser()->getDriver();
    $this->forward404Unless($Fare);
    $this->redirectIf($Fare->getDriverId() != $driver->getId(), 'sfGuardAuth/secure');

    $Fare->setFinished(1);
    $Fare->setStartAddress($request->getPostParameter('fare[start_address]'));
    $Fare->setEndAddress($request->getPostParameter('fare[end_address]'));
    $Fare->setDuration($request->getPostParameter('fare[duration]'));
    $Fare->setDistance($request->getPostParameter('fare[distance]'));
    $Fare->save();

    $this->redirect("@homepage");

  }
  
}
