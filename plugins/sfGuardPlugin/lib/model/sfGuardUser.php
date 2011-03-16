<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUser.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUser extends PluginsfGuardUser
{

  public function setUnavailable($from_time, $to_time, $fare = null) {
      if($fare) {
          foreach($fare->getUserUnavailabilitys() as $unavailability) {
              $unavailability->delete();
          }
      }

      $unavailability = new UserUnavailability();
      $unavailability->setsfGuardUser($this);
      if($fare) {
          $unavailability->setFareId($fare->getId());
      }
      $unavailability->setFromDatetime($from_time);
      $unavailability->setToDatetime($to_time);
      $unavailability->save();
  }

    public function isAvailable($Fare) {

        $from_time = new sfDate($Fare->getDatetime());
        $to_time = new sfDate($Fare->getDatetime());
        $to_time->addMinute($Fare->getDuration());


        $c = new Criteria();
        $c->add(UserUnavailabilityPeer::USER_ID,$this->getId());

        $user_unavailabilities = UserUnavailabilityPeer::doSelect($c);

        $uvs = array();

        foreach ($user_unavailabilities as $uv) {
            if($from_time->dump() >= $uv->getFromDatetime() && $from_time->dump() <= $uv->getToDatetime()) {
            $uvs[] = $uv;
            }
            if($to_time->dump() >= $uv->getFromDatetime() && $to_time->dump() <= $uv->getToDatetime()) {
            $uvs[] = $uv;
            }
            if($from_time->dump() <= $uv->getFromDatetime() && $to_time->dump() >= $uv->getToDatetime()) {
            $uvs[] = $uv;
            }
        }

        if(count($uvs) > 0) {
            return false;
        }
        else {
            $this->setUnavailable($from_time->dump(), $to_time->dump(), $Fare);
            return true;
        }

    }

}
