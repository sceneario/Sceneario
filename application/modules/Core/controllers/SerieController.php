<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class SerieController extends GlobalController {

    protected $_slug;
    protected $_id;

    protected function _get() {
        $this->_slug  = $this->getParam('slug');
        $this->_id    = $this->getParam('id');

        $serie = new Core_Model_Mapper_Tblserie;
        $series = $serie->find($this->_id, new Core_Model_Tblserie);

        if ($series == null) {
            $this->_redirect($this->view->url(array(),'bedetheque'));
            exit('Redirection en cours');
        }

        return $series;
    }

    public function init() {
        parent::init();
        $this->view->headTitle('Série BD - ', 'PREPEND');
    }

    public function getAction() {
        $this->view->serie = $this->_get();

        $this->view->headTitle($this->view->serie->getNomSerie() . ' - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Liste des albums de ' . $this->view->serie->getNomSerie());
        $this->view->headMeta()->setName(
            'keywords', 'albums bd, série bd, ' . $this->view->serie->getNomSerie() .
            ', albums ' . $this->view->serie->getNomSerie() . ', série '. $this->view->serie->getNomSerie());
    }
}