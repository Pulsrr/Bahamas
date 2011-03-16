<?php

class myUser extends sfGuardSecurityUser
{

    public function getCustomer() {

        $c = new Criteria();
        $c->add(DriverCustomerPeer::USER_ID, $this->getGuardUser()->getId());
        $customer = DriverCustomerPeer::doSelectOne($c);

        return $customer;
    }
}
