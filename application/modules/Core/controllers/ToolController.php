<?php

class ToolController extends Zend_Controller_Action 
{ 
    public function init()
    {
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
    }
    
    /*
     * Mise en cache du FBJS - Facebook Javascript
     */
    public function channelAction()
    {

        $cache_expire = 60*60*24*365;
        header("Pragma: public");
        header("Cache-Control: max-age=".$cache_expire);
        header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
          
        echo '<script src="//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=277280558967434"></script>'; 
    }
}
