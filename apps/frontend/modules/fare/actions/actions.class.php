<?php

/**
 * fare actions.
 *
 * @package    bahamas
 * @subpackage fare
 * @author     Your name here
 */
class fareActions extends sfActions
{

  public function executeCountDriversInArea(sfWebRequest $request) {
      $this->getResponse()->setContentType('application/json');

      $lat = $request->getParameter('lat');
      $lng = $request->getParameter('lng');
      
      $c = new Criteria();
      $driver_list = DriverPeer::doSelect($c);

      $drivers = array();

      foreach($driver_list as $driver) {
            if($driver->isInArea($lat,$lng)) {
                $drivers[] = $driver;
            }
      }


      $count_drivers['count'] = count($drivers);

      return $this->renderText(json_encode($count_drivers));
  }

  public function executeDeleteConfirmation(sfWebRequest $request)
  {

      

  }

  public function executePdf(sfWebRequest $request) {
    $hash = $this->getUser()->getAttribute('hash');
    $Fare = FarePeer::retrieveByHash($hash);
    $this->forward404Unless($Fare);

  $config = sfTCPDFPluginConfigHandler::loadConfig();

  // pdf object
  $pdf = new sfTCPDF();

  // settings
  $pdf->SetFont("FreeSerif", "", 12);
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
  $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

  // init pdf doc
  $pdf->AliasNbPages();
  $pdf->AddPage();

  $html = '
    <style>
            h1 {
            font-family:sans-serif;
            font-size:30px;
            font-weight:bold;
        }
        table {
            font-family:sans-serif;
            font-size:30px;
        }
        th {
            font-weight:bold;
            width:130px;
            border:1px solid #aaaaaa;
}

td {
border:1px solid #aaaaaa;
}
    </style>

<h1>Votre réservation :</h1>
    <table>
    <tr>
        <th>Départ : </th>
        <td>'.$Fare->getStartAddress().'</td>
    </tr>
    <tr>
        <th>N° de vol ou train : </th>
        <td>'.$Fare->getFlightNumber().'</td>
    </tr>
    <tr>
        <th>Arrivée : </th>
        <td>'.$Fare->getEndAddress().'</td>
    </tr>
    <tr>
        <th>Jour de départ : </th>
        <td>'.$Fare->getDate().'
            - <b>Heure de départ : </b>
            '.$Fare->getTime().'
        </td>
    </tr>
    <tr>
        <th>Durée : </th>
        <td>'.$Fare->getDuration().' mn</td>
    </tr>
    <tr>
        <th>Distance : </th>
        <td>'.$Fare->getDistance().'</td>
    </tr>
    <tr>
        <th>Prix TTC : </th>
        <td>'.$Fare->getPriceIncludingTax().'</td>
    </tr>
</table>

<h1>
Votre chauffeur :
'.$Fare->getDriver()->getName().' - '.$Fare->getDriver()->getPhone().'
</h1>

<img style="border:1px solid #aaaaaa" src="http://maps.google.com/maps/api/staticmap?&size=300x300&maptype=roadmap&markers=color:green%7Clabel:A%7C'.$Fare->getStartLat().','.$Fare->getStartLng().'&markers=color:red%7Clabel:B%7C'.$Fare->getEndLat().','.$Fare->getEndLng().'&sensor=false"/>

';

  $pdf->writeHTML($html);

  // output
  $pdf->Output();

  // Stop symfony process
  throw new sfStopException();
  }

  public function executeConfirm(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Fare = FarePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Fare does not exist (%s).', $request->getParameter('id')));
    $Fare->setCustomerId($this->getUser()->getCustomer()->getId());
    $Fare->setConfirmed(1);
    $Fare->save();

    $message = "Confirmation Allocab. Départ de ".$Fare->getStartAddress()." le ".$Fare->getDate(). " à " .$Fare->getTime();
    SmsClass::sendSms($Fare->getDriverCustomer()->getPhoneInternational(), substr($message,0,160));

    $this->redirect('fare/resume');
  }

  public function executeResume(sfWebRequest $request)
  {
    $hash = $this->getUser()->getAttribute('hash');
    $this->Fare = FarePeer::retrieveByHash($hash);
    $this->forward404Unless($this->Fare);

  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $c =new Criteria();
    $c->add(FarePeer::CUSTOMER_ID,$this->getUser()->getCustomer()->getId());
    $c->add(FarePeer::CONFIRMED, 1);
    $c->add(FarePeer::TAKEN, 0);
    $c->add(FarePeer::FINISHED, 0);

    $c->addAscendingOrderByColumn(FarePeer::DATETIME);
    $this->Fares = FarePeer::doSelect($c);
  }

  public function executeArchives(sfWebRequest $request)
  {
    $c =new Criteria();
    $c->add(FarePeer::CUSTOMER_ID,$this->getUser()->getCustomer()->getId());
    $c->add(FarePeer::FINISHED, 1);
    $c->addDescendingOrderByColumn(FarePeer::DATETIME);
    $this->Fares = FarePeer::doSelect($c);

  }

  public function executeShow(sfWebRequest $request)
  {
    $hash = $this->getUser()->getAttribute('hash');
    $this->Fare = FarePeer::retrieveByHash($hash);
    $this->forward404Unless($this->Fare);

    $this->signinForm = new sfGuardFormSignin();
    $this->registerForm = new DriverCustomerForm();

    if(!$this->getUser()->isAuthenticated()) {
        $this->getUser()->setAttribute('referer', 'fare/show');
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FareForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Fare = FarePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Fare does not exist (%s).', $request->getParameter('id')));
    $Fare->delete();

    $this->redirect('fare/deleteConfirmation');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Fare = $form->save();

      $this->redirect('fare/show');
    }
  }
}
