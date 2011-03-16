<?php

/**
 * accountancy actions.
 *
 * @package    bahamas
 * @subpackage accountancy
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accountancyActions extends sfActions
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
    $c->add(DriverAccountPeer::DRIVER_ID, $driver->getId());
    $c->addDescendingOrderByColumn(DriverAccountPeer::CREATED_AT);
    $this->Accounts = DriverAccountPeer::doSelect($c);

    $this->PrimesIn = $driver->getPrimesIn();
    $this->PrimesOut = $driver->getPrimesOut();

    $this->countPrimesIn = $driver->countPrimesIn();
    $this->countPrimesOut = $driver->countPrimesOut();
  }
}
