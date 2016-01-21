<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class AuteurController extends GlobalController
{
    const ITEM_PER_PAGE = 20;

    private $auteurMapper;
    private $auteur;
    private $id;

    public function init()
    {
        parent::init();
        $this->auteurMapper = new Core_Model_Mapper_Tblauteurs();
        $this->view->headTitle('Auteurs BD - ', 'PREPEND');
    }

    public function listAction()
    {
        $this->view->letter  = $this->getParam('letter', null);
        $this->view->page    = (int)$this->getParam('page', 1);

        if ($this->view->page < 1) {
            $this->redirect301($this->view->url(array('letter' => $this->view->letter, 'page' => 1), 'listauteur_letter'));
        }
        if ((string)$this->view->page != $this->getParam('page', 1)) {
            $this->redirect301($this->view->url(array('letter' => $this->view->letter, 'page' => $this->view->page), 'listauteur_letter'));
        }

        $a                   = $this->auteurMapper->fetchAll(null, 0, 'nomAuteur LIKE \''. $this->view->letter.'%\'', 'nomAuteur ASC', false, true);
        $this->view->auteurs = $this->auteurMapper->fetchAll(self::ITEM_PER_PAGE, self::ITEM_PER_PAGE * ($this->view->page - 1), 'nomAuteur LIKE \''. $this->view->letter.'%\'', 'nomAuteur ASC', true);

        $this->view->paginator = Zend_Paginator::factory($a);
        $this->view->paginator->setCurrentPageNumber($this->view->page);
        $this->view->paginator->setItemCountPerPage(self::ITEM_PER_PAGE);

        $this->view->headTitle('Liste des auteurs BD ' . (!empty($this->view->letter) ? ' commençant par '.$this->view->letter : '') . ' - ', 'PREPEND');

        if ($this->view->page > $this->view->paginator->getPages()->pageCount) {
            $this->redirect301($this->view->url(array('letter' => $this->view->letter, 'page' => $this->view->paginator->getPages()->pageCount), 'listauteur_letter'));
        }
    }

    private function _get()
    {
        $this->id = $this->getRequest()->getParam('idAuteur');

        if(!empty($this->id)) {
            $this->auteur = $this->auteurMapper->find((int)$this->getRequest()->getParam('idAuteur'), new Core_Model_Tblauteurs);

            if (!empty($this->auteur)) {
                $good_url = $this->view->getHelper('customUrl')->getAuteurUrl($this->auteur);
                if ($this->getRequest()->getRequestUri() != $good_url) {
                    $this->redirect301($good_url);
                }
                return true;
            }
        }
        throw new Zend_Controller_Action_Exception('Cet auteur n\'existe pas', 404);
    }

    public function indexAction()
    {
        $this->_get();

        $this->view->nomAuteur    = $this->auteur->getPrenomAuteur() . ' ' . ucwords(strtolower($this->auteur->getNomAuteur()));
        $this->view->bio          = $this->auteur->getBiographie();
        $this->view->jobsAuteur   = $this->getJobs($this->auteur);
        $this->view->albumsAuteur = $this->auteurMapper->getAuteurAlbums($this->id);
        $albumsAuteurPrices       = $this->auteurMapper->getAuteurAlbumPrices($this->id);

        $this->view->headTitle($this->view->nomAuteur.' - ', 'PREPEND');
        $this->view->headMeta()->setName('description', !empty($this->view->bio) ? substr(strip_tags($this->view->bio), 0 , 250).'...' : 'Découvrez '.$this->view->nomAuteur.' auteur BD sur Sceneario.com');
        $this->view->headMeta()->setName('keywords', $this->view->nomAuteur.', '.$this->view->jobsAuteur.','.implode(',', (array_map(create_function('$e', 'return $e->titre;'), $this->view->albumsAuteur))));
        $this->view->headMeta()->setProperty('og:title', $this->view->nomAuteur);
        $this->view->headMeta()->setProperty('og:description', !empty($this->view->bio) ? substr(strip_tags($this->view->bio), 0 , 250).'...' : 'Découvrez '.$this->view->nomAuteur.' auteur BD sur Sceneario.com');        

        $albumPrices = array();
        foreach($albumsAuteurPrices as $albumsAuteurPrice){
            $albumPrice  = new stdClass();
            $albumMapper = new Core_Model_Mapper_Tblalbum;
            $albumInfos  = $albumMapper->find($albumsAuteurPrice->idAlbum, new Core_Model_Tblalbum);

            $albumPrice->festival  = $albumsAuteurPrice->nomFestival . ' ' . $albumsAuteurPrice->annee;
            $albumPrice->prix      = $albumsAuteurPrice->nomPrix;
            $albumPrice->serie     = $albumsAuteurPrice->collection;
            $albumPrice->serie    .= $albumInfos->getTome() != 0 ? '&nbsp;#' . $albumInfos->getTome() : '';
            $albumPrice->url       = $this->view->customUrl(
                array(
                    'titleSerie' => $albumInfos->getCollection() . ' ' . $albumInfos->getTome(),
                    'titleAlbum' => $albumInfos->getTitre(),
                    'idAlbum'    => $albumInfos->getIdAlbum()),
                'album'
            );
            $albumPrices[] = $albumPrice;
        }

        $auteurGallery    = $this->auteurMapper->getAuteurGallery($this->id);
        # $auteurPreview    = $this->auteurMapper->getAuteurPreview($this->id);
        $auteurExpos      = $this->auteurMapper->getAuteurExpos($this->id);
        $auteurInterview  = $this->auteurMapper->getAuteurInterview($this->id);

        $blocDatas  = array();
        foreach($auteurExpos as $auteurExpo){
            $exposData = array(
                'rubrique'   => 'Salons, expositions',
                'titre'      => $auteurExpo->titre,
                'sous_titre' => $auteurExpo->sousTitre,
                'text'       => $auteurExpo->date,
                'image'      => $auteurExpo->image,
                'id'         => $auteurExpo->idexpo,
                'couleur'    => 'white',
                'lien'       => array(
                    'type'          => 'voir tout',
                    'url'           => $this->view->customUrl(array('title' => $auteurExpo->titre, 'idexpo' => $auteurExpo->idexpo), 'expo'),
                    'tout_afficher' => ''
                ),
            );

            $blocDatas[] = $this->view->partial('partials/block300.phtml', array('data' => $exposData));
         }

        $utils = new Core_Service_Utilities;

        foreach($auteurGallery as $gallery){
            $rubrique     = strtolower($gallery->typeDossier) == 'carnet' ? 'Galeries' : 'Previews';
            $routeList    = strtolower($gallery->typeDossier) == 'carnet' ? 'listgalerie' : 'listpreview';
            $galleryData = array(
                'rubrique' => $rubrique,
                'titre'      => $gallery->titreDossier,
                'sous_titre' => $gallery->titreSommaire,
                'text'       => $gallery->titreSommaire,
                'image'      => $utils->getImages($gallery->lienImage, false),
                'couleur'    => 'white',
                'id'         => $gallery->idDossier,
                'lien'       => array(
                    'type'          => 'voir tout',
                    'url'           => $this->view->customUrl(array('nom' => $gallery->titreDossier, 'id' => $gallery->idDossier), 'galerie'),
                    'tout_afficher' => $this->view->customUrl(array(), $routeList)
                ),
            );

            $blocDatas[] = $this->view->partial('partials/block300.phtml', array('data' => $galleryData));
        }

        foreach($auteurInterview as $interview){
            $interviewData = array(
                'rubrique' => 'Interviews',
                'titre'      => $interview->titreInterview,
                'sous_titre' => $interview->soustitreInterview,
                'text'       => $interview->soustitreInterview,
                'image'      => $utils->getImages($interview->lienImage, true),
                'id'         => $interview->idInterview,
                'couleur'    => 'white',
                'lien'       => array(
                    'type'          => 'lire la suite',
                    'url'           => $this->view->customUrl(array('nom' => $interview->titreInterview, 'id' => $interview->idInterview), 'interview'),
                    'tout_afficher' => $this->view->customUrl(array(), 'listinterview')
                ),
            );

            $blocDatas[] = $this->view->partial('partials/block300.phtml', array('data' => $interviewData));
        }

        $this->view->blocDatas     = $blocDatas;
        $this->view->allAlbumPrice = $albumPrices;
    }

    private function getJobs()
    {
        $jobs  = array();
        if ($this->auteur->getScenariste() == 'O') {
            $jobs[] = 'Scenariste';
        }
        if ($this->auteur->getDessinateur() == 'O') {
            $jobs[] = 'Dessinateur';
        }
        if ($this->auteur->getColoriste() == 'O') {
            $jobs[] = 'Coloriste';
        }

        return implode(' / ', $jobs);
    }
}