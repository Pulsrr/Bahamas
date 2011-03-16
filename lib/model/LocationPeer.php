<?php


/**
 * Skeleton subclass for performing query and update operations on the 'location' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Fri Mar  4 23:23:33 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class LocationPeer extends BaseLocationPeer {

  static public function retrieveForSelect($q, $limit)
  {
    $c = new Criteria();
    $c->setIgnoreCase(true);
    $c->add(LocationPeer::ADRESS, '%'.$q.'%', Criteria::LIKE);
    $c->addAscendingOrderByColumn(LocationPeer::ADRESS);
    $c->setLimit($limit);

    $locations = array();
    foreach (LocationPeer::doSelect($c) as $location)
    {
      $locations[]['adress'] = (string) $location->getAdress();
    }

    return $locations;
  }


} // LocationPeer