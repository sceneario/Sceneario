<?php


class Core_Form_Review extends Zend_Form
{
	public function init ()
	{
	
 
		
		$elmtPseudo = new Zend_Form_Element_Text('review_pseudo');
	    $elmtMail   = new Zend_Form_Element_Text('review_mail');
		$elmtReview = new Zend_Form_Element_Textarea('review_text');
		$elmtSubmit = new Zend_Form_Element_Submit('review_submit');
		
		$elmtPseudo->setLabel('Indiquez votre pseudo :')
		           ->addFilters(array('StringTrim', 'StripTags'))
		           ->setRequired(true);
		           
		$elmtMail->setLabel('Indiquez votre adresse e-mail :')
		         ->addFilters(array('StringTrim', 'StripTags'))
                 ->addValidator('EmailAddress')
		         ->setRequired(true);
		         
		$elmtReview->setLabel('Rédigez votre avis :')
		           ->addFilters(array('StringTrim', 'StripTags'))
		           ->setRequired(true);
		     
		
		$elmtReviewDontLikeBot = new Zend_Form_Element_Text('review_dont_like_bot');       
	 
		           
		$elmtSubmit->setLabel('Envoyer mon avis');
		
		
		$this->addElements(array($elmtPseudo, $elmtMail, $elmtReview ,$elmtReviewDontLikeBot, $elmtSubmit)) ;
		
	}

}