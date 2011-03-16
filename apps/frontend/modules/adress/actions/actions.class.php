<?php

/**
 * adress actions.
 *
 * @package    bahamas
 * @subpackage adress
 * @author     Your name here
 */
class adressActions extends sfActions
{

public function executeAjax($request)
{
  $this->getResponse()->setContentType('application/json');

  $locations = LocationPeer::retrieveForSelect($request->getParameter('q'), $request->getParameter('limit'));

  return $this->renderText(json_encode($locations));
}

}
