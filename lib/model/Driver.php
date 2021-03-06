<?php


/**
 * Skeleton subclass for representing a row from the 'driver' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/01/11 10:34:30
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Driver extends BaseDriver {

  public function __toString()
  {
    return $this->getName();
  }

  public function isInArea($lat1,$lng1) {

    $lat2 = $this->getHqLat();
    $lng2 = $this->getHqLng();

  $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
  $rlo1 = deg2rad($lng1);
  $rla1 = deg2rad($lat1);
  $rlo2 = deg2rad($lng2);
  $rla2 = deg2rad($lat2);
  $dlo = ($rlo2 - $rlo1) / 2;
  $dla = ($rla2 - $rla1) / 2;
  $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo
));
  $d = 2 * atan2(sqrt($a), sqrt(1 - $a));

  $distance = ($earth_radius * $d)/1000;
  if($distance > $this->getHqArea()) {
      return false;
  }
  else {
      return true;
  }

  }

  public function getPrimesIn() {
      $c = new Criteria();
      $c->add(PrimePeer::DRIVER_ID,$this->getId());
      $c->add(PrimePeer::PAYER_ID,$this->getId(),  Criteria::NOT_EQUAL);
      $c->addDescendingOrderByColumn(PrimePeer::CREATED_AT);
      $primes = PrimePeer::doSelect($c);

      return $primes;
  }

  public function getPrimesOut() {
      $c = new Criteria();
      $c->add(PrimePeer::PAYER_ID,$this->getId());
      $c->add(PrimePeer::DRIVER_ID,$this->getId(),  Criteria::NOT_EQUAL);
      $c->addDescendingOrderByColumn(PrimePeer::CREATED_AT);
      $primes = PrimePeer::doSelect($c);

      return $primes;
  }

  public function countPrimesIn() {
      $primes = $this->getPrimesIn();
      $total = 0;
      foreach($primes as $prime) {
          $total = $total + $prime->getAmount();
      }
      return $total;
  }

  public function countPrimesOut() {
      $primes = $this->getPrimesOut();
      $total = 0;
      foreach($primes as $prime) {
          $total = $total + $prime->getAmount();
      }
      return $total;
  }

  public function setHq($hq) {
      $hg = $this->getHq();
      $geocoding = GmapClass::getGeocoding($hq);
      $hq = $geocoding->result->formatted_address;

      $this->setHqLat($geocoding->result->geometry->location->lat);
      $this->setHqLng($geocoding->result->geometry->location->lng);

      parent::setHq($hq);
  }

} // Driver
