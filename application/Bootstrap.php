<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function initIsLteIE6()
    {
        echo 'isLteIE6()';
        #require('functions.php'); 
        #if (isLteIE6()) { header('Location: ie6/index.php'); } 
    }

}

