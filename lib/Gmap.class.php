<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GmapClass
 *
 * @author Tiercelin
 */
class GmapClass {

    static function getDirection($from,$to){

        $url = "http://maps.googleapis.com/maps/api/directions/xml?origin=".$from."&destination=".$to."&sensor=false";
        $xml = simplexml_load_file($url);
        return $xml;
    }

    static function getGeocoding($adress){

        $adress = urlencode($adress);
        $url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$adress."&sensor=false";
        $xml = simplexml_load_file($url);
        return $xml;
    }

}
?>
