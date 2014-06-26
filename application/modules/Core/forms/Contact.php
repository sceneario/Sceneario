<?php

class Core_Form_Contact extends Zend_Form
{

    public function init() {

        parent::init();

        $this->addElementPrefixPath('Core_Validate', APPLICATION_PATH.'/modules/Core/validate/', 'validate');

        $this->setElementDecorators(
            array(
                'ViewHelper',                                                                                           // permet l'affichage de l'élément lui-même
                array('Label', array('escape' => false, 'requiredSuffix' => '<span class=\'required\'> * </span>')),    //permet affichage du label
                'Description',
                array('Errors', array('class' => 'field-error')),
            )
        );
        $this->setAttrib('class', 'form form-contact clearfix');

        $this->setMethod(Zend_Form::METHOD_POST);
        $this->setAction('#');

        $this->addElement('select', 'reason', array(
            'multiOptions' => array(
                'Remarque sur une fiche BD/auteur/série',
                'Remarque à propos du site',
                'Demande de partenariat',
                'Postuler chez Sceneario.com',
            ),
            'attribs' => array(
                'class' => 'field-select'
            ),
            'required' => true
        ));

        $this->addElement('text', 'name', array(
            'label' => 'Nom / Prénom',
            'filters' => array('StringTrim'),
            'attribs' => array(
                'class' => 'field-text'
            ),
            'validators' => array(
                array('NotEmpty', true, array('messages' => 'Veuillez indiquer votre nom.')),
                array('Alpha', true, array('messages' => 'Ce champ ne doit contenir que des lettres.'))
            ),
            'required' => true
        ));

        $this->addElement('text', 'email', array(
            'label' => 'E-mail',
            'filters' => array('StringTrim'),
            'attribs' => array(
                'class' => 'field-text'
            ),
            'validators' => array(
                array('NotEmpty', true, array('messages' => 'Veuillez indiquer votre email.')),
                array('EmailAddressCustom', true, array('messages' => 'Le format de l\'email est invalide.'))
            ),
            'required' => true
        ));

        $this->addElement('textarea', 'message', array(
            'label' => 'Message',
            'filters' => array('StringTrim'),
            'attribs' => array(
                'class' => 'field-textarea',
            ),
            'validators' => array(
                array('NotEmpty', true, array('messages' => 'Vous n\'avez pas saisi de message.')),
            ),
            'required' => true
        ));

        $this->addElement('submit', 'submit',
            array(
                'ignore' => true,
                'label' => 'Envoyer',
                'attribs' => array(
                    'class' => 'btn-action'
                )
            )
        );
    }
}

?>