<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';
require_once APPLICATION_PATH . '/modules/Core/views/helpers/CustomUrl.php';

/*
 * Contact controller
 */
class ContactController extends GlobalController 
{

    public function init() {
        parent::init();
        $this->view->headTitle('Contact - ', 'PREPEND');
    }

    public function contactAction() {

        if ($this->getRequest()->isXmlHttpRequest()) {
            $this->getHelper('layout')->disableLayout();
            $this->getHelper('ViewRenderer')->setNoRender();
        }

        $request = $this->getRequest();
        $form = new Core_Form_Contact();
        $form->setAction($this->view->url(array(), 'contact', true));

        if ($request->isPost()) {
            $post = $request->getParams();

            if ($form->isValid($post)) {
                $values      = $form->getValues();
                $reasonArray = $form->getElement('reason')->getMultiOptions();

                $to          = 'aubertbonneau@sceneario.com';
                $subject     = '[Sceneario.com] Demande de contact de '.$values['name'];

                $content = "Bonjour, \n\n";
                $content .= "Un visiteur vient d'envoyer une demande de contact\n\n";
                $content .= "Raison de sa demande de contact : ".$reasonArray[$values['reason']]."\n\n";
                $content .= "Informations sur le visiteur :\n";
                $content .= "Nom : ".$values['name']."\n";
                $content .= "E-mail : ".$values['email']."\n";
                $content .= "Message : \n".$values['message']."\n";

                try {
                    $mail = new Zend_Mail('UTF-8');
                    $mail->setFrom($to);
                    $mail->addTo($to);
                    $mail->setSubject($subject);
                    $mail->setBodyText($content);
                    if ($mail->send()) {
                        echo json_encode(
                            array(
                                "status" => 1,
                                "msg" => 'Votre message a bien été envoyé !'
                            )
                        );
                    } else {
                        return false;
                    }
                } catch(Zend_Mail_Exception $e) {
                    $error = "Error : ".$e->getCode()." Message : ".$e->getMessage();
                    return false;
                }
            } else {
                $this->view->form = $form->populate($post);

                if ($this->_request->isXmlHttpRequest()) {
                    echo json_encode(
                        array(
                            "status" => 0,
                            "form" => $this->view->partial('_forms/contact.phtml', 'Core', array('form' => $this->view->form))
                        )
                    );
                    exit;
                }
            }
        } else {
            $this->view->form = $form;
        }
    }
}