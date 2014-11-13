<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

/*
 * 
 */
class AlbumController extends GlobalController
{
    private $_mapperAlbum;
    private $_album;
    private $_id;

    /*
     * Set le mapper une seule fois
     */
    public function init() {
        parent::init();
        $this->_mapperAlbum = new Core_Model_Mapper_Tblalbum();
    }

    /*
     *
     */
    private function _get() {
        $this->_id = $this->getRequest()->getParam('idAlbum');

        if(!empty($this->_id)) {
            $this->_album = $this->_mapperAlbum->find((int)$this->getRequest()->getParam('idAlbum'), new Core_Model_Tblalbum);

            if (!empty($this->_album)) {
                $good_url = $this->view->getHelper('customUrl')->getAlbumUrl($this->_album);
                if ($this->getRequest()->getRequestUri() != $good_url) {
                    $this->redirect301($good_url);
                }
                return true;
            }
        }
        throw new Zend_Controller_Action_Exception('Cet album n\'existe pas', 404);
    }

    /*
     * index action
     */
    public function indexAction() {
        $this->_get();

        $utils = new Core_Service_Utilities;

        if (Zend_Registry::isRegistered('currentUserID')) {
            $userId = Zend_Registry::get('currentUserID');
            $data = new stdClass();
            $data->user_id = $userId ;
            $data->bdid_to_add = $this->_album->getIdAlbum() ;
            $tblUserBdthequeV6 = new Core_Model_Mapper_TblUserBdthequeV6();

            $data->type = 'list_album_to_buy';
            $this->view->inUserBdtechAchat = !$tblUserBdthequeV6->albumNotExist($data);

            $data->type = 'list_my_album';
            $this->view->inUserBdtechFav   = !$tblUserBdthequeV6->albumNotExist($data);
        }

        //************//
        /**REVIEW**/
        $reviewForm = new Core_Form_Review();
        

        if($this->getRequest()->isPost()){
            if($reviewForm->isValid($_POST)){
                //Zend_Debug::dump($_POST);
                $TblcritiqueprovModel  = new Core_Model_Tblcritiqueprov();
                $TblcritiqueprovMapper = new Core_Model_Mapper_Tblcritiqueprov();
                
                $review_pseudo = $reviewForm->getValue('review_pseudo') ;
                $review_email  = $reviewForm->getValue('review_mail');
                $rawCritique = stripslashes($reviewForm->getValue('review_text')) ;
                $review_critique = $rawCritique;
                $review_critique = nl2br($review_critique);
                
                if($reviewForm->getValue('review_dont_like_bot') !== ''){
                    exit('_PLOP_');
                }
                
                //Zend_Debug::dump($reviewForm);
                //exit;
                
                $TblcritiqueprovModel->setIdAlbum($this->_album->getIdAlbum())
                                     ->setPseudo($review_pseudo)
                                     ->setCritique($review_critique)
                                     ->setDatecreation(date("Y-m-d H:i:s"))
                                     ->setAdrMail($review_email)
                                     ->setT_Valide('N') ;
                                     
                $titreAlbumForMail = $this->_album->getTitre();
                try{
                    if($TblcritiqueprovMapper->save($TblcritiqueprovModel)){
                    
                        $sujet="[AVIS] $titreAlbumForMail par " . $review_pseudo ;
                        
                        $mailBody = "Voici les renseignements ";
                        $mailBody .= "\nPseudo : " . $review_pseudo ;
                        $mailBody .= "\nEmail : " . $review_email ;
                        $mailBody .= "\n";
                        $mailBody .= "\nNumÈro de l'album: " .$this->_album->getIdAlbum();
                        $mailBody .= "\n";
                        $mailBody .= "\nAlbum : $titreAlbumForMail";
                        $mailBody .= "\n";
                        $mailBody .= "\nCommentaire : " . $rawCritique;
                        $mailBody .= "\n";
                        $mailBody .= "\nPour valider cette critique, cliquer ici :"; 
                        $mailBody .= "http://admin.sceneario.com/ActionBase.php?idObjet=$this->_album->getIdAlbum()&action=listecritiquesprov&type=album";
      
                        $header ="From: critique_internaute@sceneario.com \nReply-To:critique_internaute@sceneario.com\n";
                        try {
                            if(mail("membres@ml.sceneario.com",$sujet,$mailBody,$header, "-faubertbonneau@sceneario.com")){
                                echo '<script>alert("Votre avis a bien été enregistré, il apparaitra après validation.");</script>';
                            }
                        }catch(exception $e){
                            #Zend_Debug::dump($e);
                            #exit;
                        }
                    }               
                }
                catch(exception $e){
                    #Zend_Debug::dump($e);
                    #exit;
                    echo '<script>alert("Oups ! Une erreur est survenue.");</script>';   
                }
            }    
         }
         $this->view->reviewForm = $reviewForm;
         //****//
        
        
        #echo '<pre>';
        #print_r($this->_album);
        #echo '</pre>'; 
        
        if(is_object($this->_album)){
            $serieMapper = new Core_Model_Mapper_Tblserie;
            $this->view->serie = $serieMapper->find($this->_album->getIdSerie(), new Core_Model_Tblserie);
        }
        
        if($this->_album->getFKidEditeur() != ''){
            $editeurMapper = new Core_Model_Mapper_Tblediteur();
            $editeurInfos  = $editeurMapper->find($this->_album->getFKidEditeur(), 
                                                  new Core_Model_Tblediteur) ;
        }
        
        
        $mapperCoupdecoeur = new Core_Model_Mapper_Tblcoupdecoeurint();
        $currentWeek       = date('YW');
        
        $this->view->currentUserLike = $mapperCoupdecoeur->checkIfUserLike($this->_album->getIdAlbum(), $currentWeek); //1 ou 0
 
        //recuperation des dessinateurs
        $albumDessinateurs = $this->_mapperAlbum->getAlbumDessinateurs($this->_album->getIdAlbum());
        
        //recuperation des coloristes
        $albumColoristes   = $this->_mapperAlbum->getAlbumColoristes($this->_album->getIdAlbum());
        
        //recuperation des scenaristes
        $albumScenaristes  = $this->_mapperAlbum->getAlbumScenaristes($this->_album->getIdAlbum());
        
        //recuperation des mots clés
        $albumKeywords     = count($this->_mapperAlbum->getAlbumKeywords($this->_album->getIdAlbum())) > 0
                                   ? $this->_mapperAlbum->getAlbumKeywords($this->_album->getIdAlbum()) 
                                   : null;
        
        #var_dump($albumKeywords);
        //exit;
        
        //recuperation du resume
        $albumExcerpt      = $this->_mapperAlbum->getAlbumExcerpt($this->_album->getIdAlbum());
        
        //recuperation de l'avis des internautes
        $albumCritic       = $this->_mapperAlbum->getAlbumCritic($this->_album->getIdAlbum());
        
        
        if(isset($editeurInfos)){
         
            $urlEditeur = strpos($editeurInfos->getAdrWebEditeur(), 'http://') != false ?
                                 $editeurInfos->getAdrWebEditeur() :
                                 'http://' . $editeurInfos->getAdrWebEditeur() ;
            
            $nomEditeur = $editeurInfos->getPrenomEditeur() != '' ? $editeurInfos->getPrenomEditeur() 
                                                                    . ' ' . $editeurInfos->getNomEditeur() :
                                                                    $editeurInfos->getNomEditeur() ;
        }else{
            $nomEditeur = 'NC';
        }
        $clauseInterview = array();//"t2.idAuteur = '$auteur->idAuteur'"
        
        $idAuteurs = array() ;
        
        foreach($albumDessinateurs as $dessinateur){
            $idAuteurDessinateur = $dessinateur->idAuteur ;
            $idAuteurs[] = $dessinateur->idAuteur ;
            $clauseInterview[] = " t2.idAuteur = '$idAuteurDessinateur' "  ;
        }
        
        foreach($albumColoristes as $coloriste){
            $idAuteurColoriste = $coloriste->idAuteur;
            $idAuteurs[] = $coloriste->idAuteur ;
            $clauseInterview[] = " t2.idAuteur = '$idAuteurColoriste' "  ;
        }
        
        foreach($albumScenaristes as $scenariste){
            $idAuteurScenariste = $scenariste->idAuteur ;
            $idAuteurs[] = $scenariste->idAuteur ;
            $clauseInterview[] = " t2.idAuteur = '$idAuteurScenariste' "  ;
        }
        
        
        
        $auteurMapper       = new Core_Model_Mapper_Tblauteurs;
        
        $allAlbumPrices     = array();
        foreach($idAuteurs as $idAuteurForPrice){
            $auteurInfos        = $auteurMapper->find($idAuteurForPrice, new Core_Model_Tblauteurs);
            $albumsAuteurPrices = $auteurMapper->getAuteurAlbumPrices($idAuteurForPrice);
            
            $albumPrices = array();
        
            foreach($albumsAuteurPrices as $key => $albumsAuteurPrice){
             
                if($albumsAuteurPrice->idAlbum == $this->_album->getIdAlbum()){
                     
                    $albumPrice  = new stdClass();
                    $albumMapper = new Core_Model_Mapper_Tblalbum ;
                    $this->_album  = $albumMapper->find($albumsAuteurPrice->idAlbum, new Core_Model_Tblalbum);

                    $albumPrice->festival  = $albumsAuteurPrice->nomFestival . ' ' . $albumsAuteurPrice->annee ;
                    $albumPrice->prix      = $albumsAuteurPrice->nomPrix ;
                    $albumPrice->serie     = $albumsAuteurPrice->collection ;
                    $albumPrice->serie    .= $this->_album->getTome() != 0
                                                          ? '&nbsp;#' . $this->_album->getTome() 
                                                          : '' ;
                    $albumPrice->url       = $this->view->customUrl(array('titleSerie' => $this->_album->getCollection() . ' ' . $this->_album->getTome(),
                                                                          'titleAlbum' => $this->_album->getTitre(), 
                                                                          'idAlbum'    => $this->_album->getIdAlbum()), 'album' );        

                    $albumPrices[] = $albumPrice;
                }
             
            }
            if(count($albumPrices) > 0){
                $allAlbumPrices  = $albumPrices ;
                $this->view->allAlbumPrice = $allAlbumPrices ;
            }
        }
        
      #  echo '<pre>';
      #  print_r($allAlbumPrices);
      #  echo '</pre>';
      #  exit;
        
        $albumConnexes           = $this->_mapperAlbum->getAlbumConnexes($this->_album->getIdAlbum());
        
        //la clause est construite en fonction du nbre d'intervenant sur la bd
        //pour recuperer un max d'interview possible
        if(isset($clauseInterview) && count($clauseInterview) > 0){
              $clausesInterviewStr     = ' ('. implode('OR', $clauseInterview)  . ') ' ;
              $albumInterviews         = $this->_mapperAlbum->getAlbumInterview( $clausesInterviewStr ) ;
        }else{
            $albumInterviews = null;
        }
        
        $this->_album->recommande         = $this->_mapperAlbum->checkAlbumRecommande($this->_album->getIdAlbum());
        
        #print_r($this->_album->recommande);
        
        $this -> view -> albumInfos     = $this->_album;
        $this -> view -> editeur        = array('nom' => $nomEditeur,
                                                'url' => $urlEditeur );
        
        $this -> view -> dessinateurs   = $albumDessinateurs ;
        $this -> view -> coloristes     = $albumColoristes ;
        $this -> view -> scenaristes    = $albumScenaristes ;
        $this -> view -> motcles        = $albumKeywords ;
        $this -> view -> resume         = $albumExcerpt ;
        $this -> view -> critique       = $albumCritic ;
        $this -> view -> interview      = $albumInterviews ;
        $this -> view -> albumsconnexes = $albumConnexes;

       if('' != $this->_album->getIdCollection()){ 
           $collectionMapper = new Core_Model_Mapper_Tblcollections;
           $collectionInfos  = $collectionMapper->find($this->_album->getIdCollection(), 
                                                       new Core_Model_Tblcollections());
           $this -> view -> collectionInfos = $collectionInfos ;
           
          # echo '<pre>';
          # var_dump($collectionInfos);
          # exit;
       }
       
       $countCoupDeCoeur = $this->_mapperAlbum->checkIfAlbumIsCoupDeCoeur($this->_album->getIdAlbum());
       $this -> view -> albumIsCoupDeCoeur = $countCoupDeCoeur[0]->total > 0 ? true : false;
       
       $this->view->applyFilter = false;
       if(isset($albumKeywords)){
           $this->view->applyFilter = $utils->applyAdultFilter($albumKeywords) == 1 ? true : false ;
           $this->view->referer     = $utils->getReferer();
       }

        $this->view->albumDescription = substr(strip_tags($albumExcerpt[0]->histoire), 0 , 250) . '...';

       $albumKeywordsRef = array();
       foreach($albumDessinateurs as $d){
           $dessinateur = $d->nomAuteur . ' ' . $d->prenomAuteur ;
           if(!in_array($dessinateur, $albumKeywordsRef)){
               $albumKeywordsRef [] = $dessinateur ;
           }
           
       }
        
       foreach($albumColoristes as $c){
           $coloriste = $c->nomAuteur . ' ' . $c->prenomAuteur  ;
           if(!in_array($coloriste, $albumKeywordsRef)){
               $albumKeywordsRef [] = $coloriste ;
           }
       }
       
       foreach($albumScenaristes as $s){
           $scenariste = $s->nomAuteur . ' ' . $s->prenomAuteur  ;
           if(!in_array($scenariste, $albumKeywordsRef)){
               $albumKeywordsRef [] = $scenariste ;
           }
       }
       
       if(isset($albumKeywords) && count($albumKeywords) > 0) {
           foreach($albumKeywords as $k){
               $albumKeywordsRef [] = $k->libelle;
           }
       }
       
       $albumKeywordsRef [] = $this->_album->getCollection() ;
       $albumKeywordsRef [] = $nomEditeur;
       
       $this->view->albumKeywordsRef = implode( ' , ', $albumKeywordsRef);

        $this->view->headOpenTag = '<head prefix="og: http://ogp.me/ns# book: http://ogp.me/ns/book#">';

        $title = ucfirst(strtolower($this->_album->getCollection()));
        if (strlen($title.' #'.$this->_album->getTome()) < 70) {
            $title .= $this->_album->getTome() != '' ? ' #'. $this->_album->getTome() : '';
        }
        if (strlen($title.$this->_album->getTitre()) < 70) {
            $title .= ' '.ucfirst(strtolower($this->_album->getTitre()));
        }
        if (strlen($title.' - Sceneario.com') < 70) {
            $this->view->headTitle($title.' - ', 'PREPEND');
        } else {
            $this->view->headTitle($title, 'SET');
        }
        $this->view->headMeta()->setName('description', $this->view->albumDescription);
        $this->view->headMeta()->setName('keywords', $this->view->albumKeywordsRef);
        $this->view->headMeta()->setProperty('og:title', $title);
        $this->view->headMeta()->setProperty('og:type', 'book');
        $this->view->headMeta()->setProperty('book:isbn', $this->_album->getIsbn());
        foreach ($albumKeywordsRef as $kw) {
            $this->view->headMeta()->appendProperty('book:tag', $kw);
        }
        $this->view->headMeta()->setProperty('og:image', 'http://'.$_SERVER['HTTP_HOST'].$this->view->customUrl( array('isbn' => $this->_album->getIsbn(), 'format' => 'small'), 'couverture'));
        $this->view->headMeta()->setProperty('og:description', $this->view->albumDescription);

       /*
        * On cherche une galerie associé
        */
       $mapperTblAlbumDossier = new Core_Model_Mapper_Tblalbumsdossier();
       $modelTblAlbumDossier  = $mapperTblAlbumDossier->fetchAll(3, array('clause' => 'idAlbum = ?', 'params' => $this->_album->getIdAlbum()) , 'dateCreation DESC' );
  
       $mapperTblDossiers = new Core_Model_Mapper_Tbldossiers();
       
       $galleries = array();
       
       foreach($modelTblAlbumDossier as $galleryAlbum){
            $gallery  = $mapperTblDossiers->find($galleryAlbum->getIdDossier(), new Core_Model_Tbldossiers);
           
            if( strtolower($gallery->getTypeDossier()) == strtolower('Carnet') ){
                $galleries[] = array('rubrique'  => 'Galeries' , 
                                    'titre'      => $gallery->getTitreDossier(), 
                                    'sous_titre' => $gallery->getTexte(), 
                                    'text'       => $gallery->getTexte() , 
                                    'image'      => $utils->getImages( $gallery->getLienImage(), false) , 
                                    'id'         => $gallery->getIdDossier()  , 
                                    'lien'       => array('type' => 'voir tout' ,
                                                         'url'  => $this->view->customUrl(array('id' => $gallery->getIdDossier(),
                                                                                          'nom'  => $gallery->getTitreDossier()),
                                                                                          'galerie'),
                                                         'tout_afficher' =>  $this->view->customUrl( array(), 'listgalerie'  )), 

                                    'couleur'    => 'white', /* les options sont white et pink */

                );
            }else{
                $galleries[] = array('rubrique'  => 'Previews' , 
                                    'titre'      => $gallery->getTitreDossier(), 
                                    'sous_titre' => $gallery->getTexte(), 
                                    'text'       => $gallery->getTexte() , 
                                    'image'      => $utils->getImages( $gallery->getLienImage(), false) , 
                                    'id'         => $gallery->getIdDossier()  , 
                                    'lien'       => array('type' => 'voir tout' ,
                                                         'url'  => $this->view->customUrl(array('id' => $gallery->getIdDossier(),
                                                                                          'nom'  => $gallery->getTitreDossier()),
                                                                                          'galerie'),
                                                         'tout_afficher' =>  $this->view->customUrl( array(), 'listpreview'  )), 

                                    'couleur'    => 'white', /* les options sont white et pink */

                );
            }
 
       }
       $this->view->galleries = $galleries ; 
       
     
       /*
        * Concours associés
        */
       $concoursMapper  = new Core_Model_Mapper_Tblconcoursent ;
    
       $concoursEnCours = $concoursMapper->fetchAll(1, 
                                                    array( 'clause' => 'enligne = ? AND idAlbum = ' . $this->_album->getIdAlbum(), 
                                                           'params' => IS_PUBLISHED), 
                                                    null) ;
       
       #echo '<pre>';
      # print_r($concoursEnCours);
     #  echo '</pre>';
      $concours = array();
       
       foreach( $concoursEnCours as $concourEnCours){
           //stand by
           
           $concours[] = array('rubrique'   => 'Concours' , 
                                'titre'      => $concourEnCours->getEntete(), 
                                'sous_titre' => '',//strip_tags($lastPublishedConcoursent[0]->getEntete()), 
                                'text'       => '', //strip_tags($lastPublishedConcoursent[0]->getEntete()) , 
                                'image'      => '/images/concours/' . $concourEnCours->getNomConcours() . '.jpg' ,
                                'id'         => $concourEnCours->getIdAlbum()  , 
                                'lien'       => array('type' => 'participer' ,
                                                      'url'  => $this->view->customUrl(
                                                                    array('nomConcours'=> $concourEnCours->getLibelleConcours(),
                                                                          'idConcours' => $concourEnCours->getNomConcours()),
                                                                          'concoursstep1'),
                                                      'tout_afficher' => $this->view->customUrl (array(), 'concours') ), 

                                'couleur'    => 'pink', /* les options sont white et pink */

            );
           
           
       }
       
       $this->view->concours = $concours ;
    }
}