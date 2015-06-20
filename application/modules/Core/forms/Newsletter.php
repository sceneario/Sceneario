<?php

class Core_Form_Newsletter extends Zend_Form
{
    public function init() {
        $this->setAttrib('class', 'form col-xs-12');

        $this->setElementDecorators(
            array(
                'ViewHelper',                                                                                           // permet l'affichage de l'élément lui-même
                array('Label', array('escape' => false, 'requiredSuffix' => '<span class=\'required\'> * </span>')),    //permet affichage du label
                'Description',
                array('Errors', array('class' => 'field-error')),
            )
        );

        $this->addElement('text', 'sceneario_text', array(
            'label' => '',
            'filters' => array('StringTrim', 'StripTags'),
            'attribs' => array(
                'class'       => 'field-text',
                'placeholder' => 'Adresse e-mail'
            ),
            'validators' => array(
                array('NotEmpty', true, array('messages' => 'Veuillez indiquer votre nom.')),
                array('EmailAddress', true)
            ),
            'required' => true
        ));

        $this->addElement('submit', 'submit', array(
                'ignore' => true,
                'label' => 'M\'inscrire à la newsletter',
                'attribs' => array(
                    'class' => 'btn field-submit'
                )
            )
        );
    }
}