<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class NewsletterController extends GlobalController
{
  public function init()
  {
    parent::init();
  }

  public function indexAction() {
    $this->view->headTitle('Newsletter - ', 'PREPEND');
    $this->view->headMeta()->setName('description', 'Newsletter Sceneario.com, recevez nos dernières mises à jour par mail : concours, actualités, nouveautés, interviews et bien d\'autres !');
    $this->view->headMeta()->setName('keywords', 'newsletter Sceneario.com');
    $this->view->headMeta()->setProperty('og:title', 'Newsletter - Sceneario.com');
    $this->view->headMeta()->setProperty('og:description', 'Newsletter Sceneario.com, recevez nos dernières mises à jour par mail : concours, actualités, nouveautés, interviews et bien d\'autres !');
  }

  public function unsubscribeAction() {
    $request        = Zend_Controller_Front::getInstance()->getRequest();
    $newsletterForm = new Core_Form_Newsletter();

    if ($request->isPost()) {
      $ret = array('message' => 'Adresse e-mail invalide.', 'status' => false);

      if ($newsletterForm->isValid($_POST)) {

	$emailUser = $newsletterForm->getValue('sceneario_text');
	$tblMailingMapper = new Core_Model_Mapper_Tblmailing();
	$tblMailingModel  = new Core_Model_Tblmailing();
	
	$tblMailingPartenairMapper = new Core_Model_Mapper_Tblmailingpartenaires();
	$tblMailingPartenairMapper->delete($emailUser);

	//test existence mail
	$mailExists = !null == $tblMailingMapper->find($emailUser ,$tblMailingModel) ? true : false;
	if ($mailExists == true) {

	  if ($tblMailingMapper->delete($emailUser)) {
	    $ret['message'] = 'Votre adresse e-mail a été supprimée de notre base de donnée.';
	    $ret['status'] = true;
	  } else {
	    $ret['message'] = '<strong>Désolé</strong>, une erreur est survenue lors de la suppression de votre adresse e-mail';
	    $ret['status'] = false;
	  }
	} else {
	  $ret['message'] = 'Votre adresse e-mail ne figure pas dans notre base de donnée.';
	  $ret['status'] = false;
	}
      }

      if ($request->isXmlHttpRequest()) {
	print json_encode($ret);
	exit;
      }
    }
    return $this->redirect('/newsletter');
  }

  public function subscribeAction() {
    $request        = Zend_Controller_Front::getInstance()->getRequest();
    $newsletterForm = new Core_Form_Newsletter();

    if ($request->isPost()) {
      $ret = array('message' => 'Adresse e-mail invalide.', 'status' => false);

      if ($newsletterForm->isValid($_POST)) {
	
	$emailUser = $newsletterForm->getValue('sceneario_text');
	$todayDate = date('Y-m-d');
	$clef      = md5($emailUser);

	if ($request->getParam('sceneario_optin', 0) == '1') {
	  $tblMailingPartenairMapper = new Core_Model_Mapper_Tblmailingpartenaires();
	  $tblMailingPartenairModel  = new Core_Model_Tblmailingpartenaires();
	  $tblMailingPartenairModel->setAdrMail($emailUser)
	    ->setDateCreation($todayDate)
	    ->setT_Valide('O')
	    ->setClef($clef)
	    ->setNberreurs(0)
	    ->setEnerreur(0);
	  $tblMailingPartenairMapper->save($tblMailingPartenairModel);
	}

	$tblMailingMapper = new Core_Model_Mapper_Tblmailing();
	$tblMailingModel  = new Core_Model_Tblmailing();
	$tblMailingModel->setAdrMail($emailUser)
	  ->setDateCreation($todayDate)
	  ->setT_Valide('O')
	  ->setClef($clef)
	  ->setNberreurs(0)
	  ->setEnerreur(0);

	//test existence mail
	$mailExists = !null == $tblMailingMapper->find($emailUser ,$tblMailingModel) ? true : false;
	if ($mailExists == false) {
	  if ($tblMailingMapper->save($tblMailingModel)) {
	    $ret['message'] = '<strong>Merci</strong>, votre inscription est prise en compte.';
	    $ret['status'] = true;
	  } else {
	    $ret['message'] = '<strong>Désolé</strong>, une erreur est survenue lors de l\'enregistrement de votre adresse e-mail';
	    $ret['status'] = false;
	  }
	} else {
	  $ret['message'] = '<strong>Désolé</strong>, votre adresse e-mail est déjà présente dans notre base de donnée.';
	  $ret['status'] = false;
	}
      }

      if ($request->isXmlHttpRequest()) {
	print json_encode($ret);
	exit;
      }
    }
    return $this->redirect('/newsletter');
  }
}
