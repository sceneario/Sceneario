<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class StaticpagesController extends GlobalController
{
    public function init()
    {
        parent::init();
    }

    public function legalmentionsAction() {
      $this->view->headTitle('Mentions Légales - ', 'PREPEND');
      $this->view->headMeta()->setName('description', 'Mentions légales de l\'association Sceneario.com');
      $this->view->headMeta()->setName('keywords', 'mentions légales Sceneario.com');
      $this->view->headMeta()->setProperty('og:title', 'Mentions Légales - Sceneario.com');
      $this->view->headMeta()->setProperty('og:description', 'Mentions légales de l\'association Sceneario.com');
    }

    public function equipeAction() {
      $this->view->headTitle('Équipe - ', 'PREPEND');
      $this->view->headMeta()->setName('description', 'Présentation de l\'équipe Sceneario.com');
      $this->view->headMeta()->setName('keywords', 'équipes, chroniqueurs, rédacteurs, Sceneario.com');
      $this->view->headMeta()->setProperty('og:title', 'Équipe - Sceneario.com');
      $this->view->headMeta()->setProperty('og:description', 'Présentation de l\'équipe Sceneario.com');
    }

}