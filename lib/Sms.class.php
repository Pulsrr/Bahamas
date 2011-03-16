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
class SmsClass {

    static function sendSms($to, $message){

        $url = "http://run.orangeapi.com/sms/sendSMS.xml?id=103abae31d8&from=38100&to=".$to."&content=".$message."";
        $xml = simplexml_load_file($url);
    }

}
?>
