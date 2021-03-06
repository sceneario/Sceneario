<?php

class Zend_View_Helper_RegisterNewsletter
{
    public function registerNewsletter($view) {
        $newsletterForm = new Core_Form_Newsletter();
        $newsletterForm->setAction('/newsletter/subscribe');
        $request        = Zend_Controller_Front::getInstance()->getRequest();

        if ($view instanceof Zend_View) {
          return $view->partial('partials/block300-newsletter.phtml', array('data' => $newsletterForm));
        }
    }
}