<?php

/**
 * home actions.
 *
 * @package    bahamas
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
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
}
