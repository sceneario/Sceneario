<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class AuteurController extends GlobalController
{
    const ITEM_PER_PAGE = 20;

    public function init()
    {
        parent::init();
        $this->view->headTitle('Auteurs BD - ', 'PREPEND');
    }

    public function listAction()
    {
        $this->view->letter  = $this->getParam('letter', null);
        $this->view->page    = $this->getParam('page', 1);

        $auteur              = new Core_Model_Mapper_Tblauteurs();
        $a                   = $auteur->fetchAll(null, 0, 'nomAuteur LIKE \''. $this->view->letter.'%\'', 'nomAuteur ASC', false, true);
        $this->view->auteurs = $auteur->fetchAll(self::ITEM_PER_PAGE, self::ITEM_PER_PAGE * ($this->view->page - 1), 'nomAuteur LIKE \''. $this->view->letter.'%\'', 'nomAuteur ASC', true);

        $this->view->paginator = Zend_Paginator::factory($a);
        $this->view->paginator->setCurrentPageNumber($this->view->page);
        $this->view->paginator->setItemCountPerPage(self::ITEM_PER_PAGE);
    }

    public function indexAction()
    {
        $idAuteur = $this->getRequest()->getParam('idAuteur');
        
        $utils = new Core_Service_Utilities;
        
        $auteurMapper = new Core_Model_Mapper_Tblauteurs;
        $auteurInfos  = $auteurMapper->find($idAuteur, new Core_Model_Tblauteurs);
        
        if($auteurInfos == null){
	        $this->_redirect(array('accueil'));
        }
        
        $this -> view -> nomAuteur          = $auteurInfos->getPrenomAuteur() 
                                              . ' ' . ucwords(strtolower($auteurInfos->getNomAuteur()));
        $this -> view -> bio                = $auteurInfos->getBiographie();
        $this -> view -> jobsAuteur         = $this -> getJobs($auteurInfos);
        $this -> view -> albumsAuteur       = $auteurMapper->getAuteurAlbums($idAuteur);
        $albumsAuteurPrices                 = $auteurMapper->getAuteurAlbumPrices($idAuteur);
        
        $this->view->headTitle($this->view->nomAuteur.' - ', 'PREPEND');
        $this->view->headMeta()->setName('description', !empty($this->view->bio) ? substr(strip_tags($this->view->bio), 0 , 250).'...' : 'Découvrez '.$this->view->nomAuteur.' auteur BD sur Sceneario.com');
        $this->view->headMeta()->setName('keywords', $this->view->nomAuteur.', '.$this->view->jobsAuteur.','.implode(',', (array_map(create_function('$e', 'return $e->titre;'), $this->view->albumsAuteur))));
        $this->view->headMeta()->setProperty('og:title', $this->view->nomAuteur);
        $this->view->headMeta()->setProperty('og:description', !empty($this->view->bio) ? substr(strip_tags($this->view->bio), 0 , 250).'...' : 'Découvrez '.$this->view->nomAuteur.' auteur BD sur Sceneario.com');        
        
        #echo '<pre>';
        #print_r($auteurInfos);
        
        $albumPrices = array();
        foreach($albumsAuteurPrices as $albumsAuteurPrice){
            $albumPrice  = new stdClass();
            $albumMapper = new Core_Model_Mapper_Tblalbum ;
            $albumInfos  = $albumMapper->find($albumsAuteurPrice->idAlbum, new Core_Model_Tblalbum);
            
            $albumPrice->festival  = $albumsAuteurPrice->nomFestival . ' ' . $albumsAuteurPrice->annee ;
            $albumPrice->prix      = $albumsAuteurPrice->nomPrix ;
            $albumPrice->serie     = $albumsAuteurPrice->collection;
            $albumPrice->serie    .= $albumInfos->getTome() != 0
                                                  ? '&nbsp;#' . $albumInfos->getTome() 
                                                  : '' ;
            $albumPrice->url       = $this->view->customUrl(array('titleSerie' => $albumInfos->getCollection() . ' ' . $albumInfos->getTome(),
                                                                  'titleAlbum' => $albumInfos->getTitre(), 
                                                                  'idAlbum'    => $albumInfos->getIdAlbum()), 'album' );        
            $albumPrices[] = $albumPrice;
        }
        
         $auteurGallery    = $auteurMapper->getAuteurGallery($idAuteur);
        # $auteurPreview    = $auteurMapper->getAuteurPreview($idAuteur);
         $auteurExpos      = $auteurMapper->getAuteurExpos($idAuteur) ;
         $auteurInterview  = $auteurMapper->getAuteurInterview($idAuteur);
         
         $blocDatas  = array();
         foreach($auteurExpos as $auteurExpo){
             $exposData = array('rubrique'   => 'Salons, expositions',
                                'titre'      => $auteurExpo->titre,
                                'sous_titre' => $auteurExpo->sousTitre,
                                'text'       => $auteurExpo->date,
                                'image'      => $auteurExpo->image,
                                'id'         => $auteurExpo->idexpo,
                                'lien'       => array('type'=> 'voir tout' , 
                                                      'url' => $this->view->customUrl(array('title' => $auteurExpo->titre, 
                                                                                            'idexpo' => $auteurExpo->idexpo), 'expo'),
                                                      'tout_afficher' =>'' ),
                                'couleur'    => 'white'
             );
             
             $bloc = $this->view->partial('partials/block300.phtml', 
                                       array('data' => $exposData));
             $bloc = null;
             #$blocDatas[] = $bloc;
         }
         
         
         
         foreach($auteurGallery as $gallery){
             
             #var_dump($gallery->typeDossier);
             $rubrique     = strtolower($gallery->typeDossier) == 'carnet' ? 'Galeries' : 'Previews' ;
             $routeList    = strtolower($gallery->typeDossier) == 'carnet' ? 'listgalerie' : 'listpreview' ;
             $galleryData = array('rubrique' => $rubrique ,
                                'titre'      => $gallery->titreDossier,
                                'sous_titre' => $gallery->titreSommaire,
                                'text'       => $gallery->titreSommaire,
                                'image'      => $utils->getImages($gallery->lienImage, false),
                                'id'         => $gallery->idDossier,
                                'lien'       => array('type'=> 'voir tout' , 
                                                      'url' => $this->view->customUrl(array('nom'=> $gallery->titreDossier, 
                                                                                            'id' => $gallery->idDossier), 'galerie'),
                                                      'tout_afficher' => $this->view->customUrl(array(), $routeList )),
                                'couleur'    => 'white'
             );
             
             $bloc = $this->view->partial('partials/block300.phtml', 
                                           array('data' => $galleryData));
             #$bloc = null;
             $blocDatas[] = $bloc;
         }
         
         
         foreach($auteurInterview as $interview){
             $interviewData = array('rubrique' => 'Interviews',
                                'titre'      => $interview->titreInterview,
                                'sous_titre' => $interview->soustitreInterview,
                                'text'       => $interview->soustitreInterview,
                                'image'      => 'http://images.sceneario.com/' . $interview->lienImage,
                                'id'         => $interview->idInterview,
                                'lien'       => array('type'=> 'lire la suite' , 
                                                      'url' =>$this->view->customUrl(array('nom' => $interview->titreInterview, 
                                                                                           'id' => $interview->idInterview), 'interview'),
                                                      'tout_afficher' => $this->view->customUrl(array(), 'listinterview')),
                                'couleur'    => 'white'
             );
             
             $bloc = $this->view->partial('partials/block300.phtml', 
                                           array('data' => $interviewData));
             
             $blocDatas[] = $bloc;
         }
         
         #print_r($blocDatas);
    
        $this -> view -> blocDatas   = $blocDatas ;
        $this -> view -> allAlbumPrice  = $albumPrices ;
        
       # echo '<pre>';
        
       # print_r($auteurExpos);
       # print_r($auteurInterview);
       # print_r($auteurGallery);
    }
    
    private function getJobs($auteurInfos)
    {
        $jobs  = '';
        $jobs .= $auteurInfos->getScenariste()  == 'O' ? ' Scenariste'  : '' ;
        $jobs .= $auteurInfos->getDessinateur() == 'O' ? ' Dessinateur' : '' ;
        $jobs .= $auteurInfos->getColoriste()   == 'O' ? ' Coloriste'   : '' ;
        
        return trim(str_replace(' ' ,  ' / ' , $jobs), ' / ') ;
    }
}

/*
 * prive
 * [1] => stdClass Object
        (
            [idAlbum] => 7061
            [collection] => ZORN ET DIRNA
            [annee] => 2007
            [nomPrix] => Meilleur Scénar' du mois de Mai des Editions Soleil
            [nomFestival] => Sceneario.com
            [lienOpale] => 
        )

 */