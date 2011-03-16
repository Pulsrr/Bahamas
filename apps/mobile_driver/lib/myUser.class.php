<?php

class myUser extends sfGuardSecurityUser
{
    public function getDriver() {

        $c = new Criteria();
        $c->add(DriverPeer::USER_ID, $this->getGuardUser()->getId());
        $driver = DriverPeer::doSelectOne($c);

        return $driver;
    }

    public function getCustomers() {
        $driver = $this->getDriver();

        $c = new Criteria();
        $c->add(DriverCustomerPeer::DRIVER_ID, $driver->getId());
        $customers = DriverCustomerPeer::doSelect($c);

        return $customers;
    }

}
