<?php
require_once APPLICATION_PATH . '/modules/Core/views/helpers/CustomUrl.php';

class GlobalController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->headOpenTag = '<head>';

        $this->view->headTitle('Sceneario.com', 'SET');

        $description = 'Site consacr&eacute; &agrave; la BD : critiques, r&eacute;sum&eacute;s, nouveaut&eacute;s, interviews, concours...';

        $this->view->headMeta('width=device-width', 'viewport');

        $this->view->headMeta($description, 'description');
        $this->view->headMeta('BD, CRITIQUE, RESUME, INTERVIEW, NOUVEAUTE, SERIE, BDS, CRITIQUES, BANDES DESSINEES, BANDE DESSINEE, SERIES', 'keywords');

        $this->view->headMeta('Sceneario.com', 'Copyright');
        $this->view->headMeta('Sceneario.com', 'publisher');
        $this->view->headMeta('Never', 'Expires');
        $this->view->headMeta('7 days', 'Revisit-after');
        $this->view->headMeta('bandes dessinées', 'category');
        $this->view->headMeta('index, follow', 'robots');
        /* authentification google */
        $this->view->headMeta('N9yzsROn12aL6salWXxgqz9U9aeSzxhFu6F5tzj6CEs=', 'verify-v1');
        $this->view->headMeta('gaTlT4pYBU3oc5bHuB1iio1MQ0nKVDThl1XDZcaCbkI=', 'verify-v1');
        $this->view->headMeta('VF0vdLsuK++ubFin2MVOAykZjtpfZu3OmDF79DGWFHI=', 'verify-v1');
        $this->view->headMeta('7M4o6nF28RlM0UiRZFplC7X0zWmr_rs_k3dLep5urGg', 'google-site-verification');
        $this->view->headMeta('hjRrgEsA5m2vA4R5ApfOTEB5UcejlbUAo56wumw7kNg', 'google-site-verification');
        /* authentification yahoo! */
        $this->view->headMeta('cbf954200f12df6f', 'y_key');

        /* FACEBOOK OPEN GRAPH */
        $this->view->doctype('XHTML1_RDFA');
        $this->view->headMeta()->setProperty('og:title', 'Sceneario.com');
        $this->view->headMeta()->setProperty('og:type', 'website');
        // Don't fetch default image, let people choose
        //$this->view->headMeta()->setProperty('og:image', 'http://'.$_SERVER['HTTP_HOST'].'/img/temp/v6-img6.jpg');
        $this->view->headMeta()->setProperty('og:url', $this->view->currentUrl());
        $this->view->headMeta()->setProperty('og:site_name', 'Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', $description);

        $this->view->isMobile = $this->isMobile();

        $this->view->block_css = array();
        $this->view->block_js  = array();
    }

    public function redirect301($url) {
        $this->_redirector = $this->_helper->getHelper('Redirector');
        $this->_redirector->setCode(301);
        $this->_redirect($url);
    }

    public function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}