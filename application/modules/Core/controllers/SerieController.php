<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class SerieController extends GlobalController {

    protected $_slug;
    protected $_id;

    protected function _get() {
        $this->_slug  = $this->getParam('slug');
        $this->_id    = $this->getParam('id');

        if (!empty($this->_id)) {
            $serie = new Core_Model_Mapper_Tblserie;
            $series = $serie->find($this->_id, new Core_Model_Tblserie);

            if (!empty($series)) {
                $good_url = $this->view->getHelper('customUrl')->getSerieUrl($series);
                if ($this->getRequest()->getRequestUri() != $good_url) {
                    $this->redirect301($good_url);
                }
                return $series;
            }
        }
        throw new Zend_Controller_Action_Exception('Cette série n\'existe pas', 404);
    }

    public function init() {
        parent::init();
    }

    public function getAction() {
        $this->view->serie = $this->_get();

        $title = ucfirst(strtolower($this->view->serie->getNomSerie()));
        if (strlen($title.'tous les albums de la série bd - Sceneario.com') < 70) {
            $this->view->headTitle($title.', tous les albums de la série bd - ', 'PREPEND');
        } else {
            $this->view->headTitle($title.', tous les albums de la série bd', 'SET');
        }
        $this->view->headMeta()->setName('description', 'Liste des albums de ' . $this->view->serie->getNomSerie());
        $this->view->headMeta()->setName(
            'keywords', 'albums bd, série bd, ' . $this->view->serie->getNomSerie() .
            ', albums ' . $this->view->serie->getNomSerie() . ', série '. $this->view->serie->getNomSerie());
    }
}