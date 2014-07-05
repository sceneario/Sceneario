<?php

class Core_Validate_EmailAddressCustom extends Zend_Validate_Abstract {

    const EMAIL_FORMAT_INVALID = 'emailinvalid';

    protected $_messageTemplates = array(
        self::EMAIL_FORMAT_INVALID => 'The format of the email is invalid'
    );

    public function isValid($value){

        $this->_setValue($value);
        $isValid = true;

        $zend_email_validate = new Zend_Validate_EmailAddress();
        if (!$zend_email_validate->isValid($value)) {
            $this->_error(self::EMAIL_FORMAT_INVALID);
            $isValid = false;
        }

        return $isValid;

    }
}

?>