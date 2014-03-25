<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class TestController extends Zend_Controller_Action
{
    public function indexAction()
    {   
        
        #echo gethostbyaddr($_SERVER['REMOTE_ADDR']) ;
        $ipFilter = new Core_Service_IpFilter();
        var_dump($ipFilter->isSpecialIp());
        
        exit();
    }
}

