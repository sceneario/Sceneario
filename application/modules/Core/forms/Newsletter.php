<?php

class Core_Form_Newsletter extends Zend_Form
{
	public function init()
	{
		$newsletterElmt = new Zend_Form_Element_Text('sceneario_text');
		$newsletterSubm = new Zend_Form_Element_Submit('sceneario_submit');
		
		$newsletterElmt->addFilters(array('StringTrim', 'StripTags'))
                       ->addValidator('EmailAddress')
		               ->setRequired(true);
		               
		$newsletterSubm->setLabel('M\'inscrire à la newsletter');
		$newsletterSubm->setIgnore(true);
		
		$this->addElements(array($newsletterElmt, 
		                         $newsletterSubm));
	}
}