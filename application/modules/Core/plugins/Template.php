<?php

class Core_Plugin_Template extends Zend_Controller_Plugin_Abstract
{
    private $_bootstrap;
    
    public function __construct($moduleName ,$bootstrap)
    {
        $this->_bootstrap = $bootstrap;
    }
}