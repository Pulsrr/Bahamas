<?php

/**
 * password actions.
 *
 * @package    bahamas
 * @subpackage password
 * @author     Your name here
 */
class passwordActions extends sfActions
{

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PasswordRetrieveForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PasswordRetrieveForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeReset(sfWebRequest $request)
  {
    $this->forward404Unless($PasswordRetrieve = PasswordRetrievePeer::retrieveByToken($request->getParameter('token')), sprintf('Object PasswordRetrieve does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($PasswordRetrieve->getToken() == $request->getParameter('token'));

    $user = sfGuardUserPeer::retrieveByUsername($PasswordRetrieve->getEmail());
    $PasswordRetrieve->delete();

    if(!$user) {
        $this->redirect('@homepage');
    }
    else {
        $pass = Tools::generatePassword();
        $user->setPassword($pass);
        $user->save();
        $this->user = $user;
        $this->pass = $pass;
    }
  }

  public function executeResume(sfWebRequest $request)
  {
    $this->forward404Unless($PasswordRetrieve = PasswordRetrievePeer::retrieveByPk($request->getParameter('id')), sprintf('Object PasswordRetrieve does not exist (%s).', $request->getParameter('id')));
    $this->PasswordRetrieve = $PasswordRetrieve;

  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $PasswordRetrieve = $form->save();

        $url = $request->getUriPrefix()."".$this->getController()->genUrl('password/reset?token='.$PasswordRetrieve->getToken());

        $Sujet = "Mot de passe oublié";
        $email = $PasswordRetrieve->getEmail();

        $From  = "From:Thomas Tiercelin<thomas.tiercelin@allocab.com>\n";
        $From .= "MIME-version: 1.0\n";
        $From .= "Content-type: text/html; charset= iso-8859-1\n";

        $Message = <<<EOF
        <a href="http://www.allocab.com"><img border="0" src="http://www.allocab.com/logo_allocab.jpg" width="218" height="60" alt="Allocab - réservation de moto taxi en ligne"/></a>
        <p>
            Bonjour, vous avez démandé une redéfinition de votre mot de passe.<br/>
            Cliquez sur le lien ci-dessous pour confirmer et prendre connaissance de votre nouveau mot de passe :<br/>
            $url
            <br/>
            A l'issue de cette procédure, votre ancien mot de passe ne sera plus actif.
        </p>
        <p>
            Note, si vous n'êtes pas à l'origine de cette demande, ne tenez pas compte de ce message,
            votre mot de passe ne sera pas redéfini.
        </p>
        <br/>
        <br/>
        Cordialement,
        <br/>
        <b>Thomas Tiercelin</b><br/>
        <i>Co-fondateur Allocab</i>
        </p>


EOF;

        mail($email,$Sujet,$Message,$From);


      $this->redirect('password/resume?id='.$PasswordRetrieve->getId());
    }
  }
}
