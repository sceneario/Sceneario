<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

/*
 * 
 */
class AlbumController extends GlobalController 
{
    private $_mapperAlbum ;
    
    /*
     * Set le mapper une seule fois
     */
    public function init()
    {
        parent::init();
        $this->_mapperAlbum = new Core_Model_Mapper_Tblalbum();
    }
    
    /*
     * Si idalbum est absent
     * on redirige vers la bedetheque
     */
    private function bedethequeRedirect()
    {
    
        if(null == $this->getRequest()->getParam('idAlbum')){
            $this->_redirect($this->view->url(array(),'bedetheque'));
            exit('Redirection en cours');
        }
    }
    
     
    /*
     * index action
     */
    public function indexAction()
    {	
    	$idAlbum = (int)$this->getRequest()->getParam('idAlbum') ;
 
	    
    
        if (Zend_Registry::isRegistered('currentUserID')) {
            #Zend_Debug::dump(Zend_Registry::get('currentUserID'));
        }
        //Redirection vers la bedetheque si l'id est manquant
        $this->bedethequeRedirect();
        
        $utils = new Core_Service_Utilities;
       
        
        
        //raccourci vers le mapper
        $mpAlb      = $this->_mapperAlbum;
        
        //recuperation des infos album
        $albumInfos = 
            $mpAlb->find($idAlbum, 
                         new Core_Model_Tblalbum);
        
        if(Zend_Registry::isRegistered('currentUserID')){
            $userId = Zend_Registry::get('currentUserID');
            $data = new stdClass();
            $data->user_id = $userId ;
            $data->bdid_to_add = $idAlbum ;
            $tblUserBdthequeV6 = new Core_Model_Mapper_TblUserBdthequeV6();
            
            $data->type = 'list_album_to_buy';
            $this->view->inUserBdtechAchat = !$tblUserBdthequeV6->albumNotExist($data);
            
            $data->type = 'list_my_album';
            $this->view->inUserBdtechFav   = !$tblUserBdthequeV6->albumNotExist($data);
        }else{
            
        }
        
       # Zend_Debug::dump($albumInfos->getTitre());
        
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
				
				$TblcritiqueprovModel->setIdAlbum($idAlbum)
				                     ->setPseudo($review_pseudo)
				                     ->setCritique($review_critique)
				                     ->setDatecreation(date("Y-m-d H:i:s"))
				                     ->setAdrMail($review_email)
				                     ->setT_Valide('N') ;
				                     
				$titreAlbumForMail = $albumInfos->getTitre();
				try{
					if($TblcritiqueprovMapper->save($TblcritiqueprovModel)){
					
						$sujet="[AVIS] $titreAlbumForMail par " . $review_pseudo ;
						
						$mailBody = "Voici les renseignements ";
						$mailBody .= "\nPseudo : " . $review_pseudo ;
						$mailBody .= "\nEmail : " . $review_email ;
						$mailBody .= "\n";
						$mailBody .= "\nNumÈro de l'album: " .$idAlbum;
						$mailBody .= "\n";
						$mailBody .= "\nAlbum : $titreAlbumForMail";
						$mailBody .= "\n";
						$mailBody .= "\nCommentaire : " . $rawCritique;
						$mailBody .= "\n";
						$mailBody .= "\nPour valider cette critique, cliquer ici :"; 
						$mailBody .= "http://admin.sceneario.com/ActionBase.php?idObjet=$idAlbum&action=listecritiquesprov&type=album";
	  
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
        #print_r($albumInfos);
        #echo '</pre>'; 
        
        if(is_object($albumInfos)){
            $serieMapper = new Core_Model_Mapper_Tblserie;
            $this->view->serie = $serieMapper->find($albumInfos->getIdSerie(), new Core_Model_Tblserie);
        }
        
        if($albumInfos->getFKidEditeur() != ''){
            $editeurMapper = new Core_Model_Mapper_Tblediteur();
            $editeurInfos  = $editeurMapper->find($albumInfos->getFKidEditeur(), 
                                                  new Core_Model_Tblediteur) ;
        }
        
        $idAlbum           = $albumInfos->getIdAlbum();
        
        $mapperCoupdecoeur = new Core_Model_Mapper_Tblcoupdecoeurint();
        $currentWeek       = date('YW');
        
        $this->view->currentUserLike = $mapperCoupdecoeur->checkIfUserLike($idAlbum, $currentWeek); //1 ou 0
 
        //recuperation des dessinateurs
        $albumDessinateurs = $mpAlb->getAlbumDessinateurs($idAlbum);
        
        //recuperation des coloristes
        $albumColoristes   = $mpAlb->getAlbumColoristes($idAlbum);
        
        //recuperation des scenaristes
        $albumScenaristes  = $mpAlb->getAlbumScenaristes($idAlbum);
        
        //recuperation des mots clés
        $albumKeywords     = count($mpAlb->getAlbumKeywords($idAlbum)) > 0
                                   ? $mpAlb->getAlbumKeywords($idAlbum) 
                                   : null;
        
        #var_dump($albumKeywords);
        //exit;
        
        //recuperation du resume
        $albumExcerpt      = $mpAlb->getAlbumExcerpt($idAlbum);
        
        //recuperation de l'avis des internautes
        $albumCritic       = $mpAlb->getAlbumCritic($idAlbum);
        
        
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
             
                if($albumsAuteurPrice->idAlbum == $idAlbum){
                     
                    $albumPrice  = new stdClass();
                    $albumMapper = new Core_Model_Mapper_Tblalbum ;
                    $albumInfos  = $albumMapper->find($albumsAuteurPrice->idAlbum, new Core_Model_Tblalbum);

                    $albumPrice->festival  = $albumsAuteurPrice->nomFestival . ' ' . $albumsAuteurPrice->annee ;
                    $albumPrice->prix      = $albumsAuteurPrice->nomPrix ;
                    $albumPrice->serie     = $albumsAuteurPrice->collection ;
                    $albumPrice->serie    .= $albumInfos->getTome() != 0
                                                          ? '&nbsp;#' . $albumInfos->getTome() 
                                                          : '' ;
                    $albumPrice->url       = $this->view->customUrl(array('titleSerie' => $albumInfos->getCollection() . ' ' . $albumInfos->getTome(),
                                                                          'titleAlbum' => $albumInfos->getTitre(), 
                                                                          'idAlbum'    => $albumInfos->getIdAlbum()), 'album' );        

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
        
        $albumConnexes           = $mpAlb->getAlbumConnexes($idAlbum);
        
        //la clause est construite en fonction du nbre d'intervenant sur la bd
        //pour recuperer un max d'interview possible
        if(isset($clauseInterview) && count($clauseInterview) > 0){
	          $clausesInterviewStr     = ' ('. implode('OR', $clauseInterview)  . ') ' ;
	          $albumInterviews         = $mpAlb->getAlbumInterview( $clausesInterviewStr ) ;
        }else{
	        $albumInterviews = null;
        }
        
        $albumInfos->recommande         = $mpAlb->checkAlbumRecommande($idAlbum);
        
        #print_r($albumInfos->recommande);
        
        $this -> view -> albumInfos     = $albumInfos;
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

       if('' != $albumInfos->getIdCollection()){ 
           $collectionMapper = new Core_Model_Mapper_Tblcollections;
           $collectionInfos  = $collectionMapper->find($albumInfos->getIdCollection(), 
                                                       new Core_Model_Tblcollections());
           $this -> view -> collectionInfos = $collectionInfos ;
           
          # echo '<pre>';
          # var_dump($collectionInfos);
          # exit;
       }
       
       $countCoupDeCoeur = $mpAlb->checkIfAlbumIsCoupDeCoeur($idAlbum);
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
       
       $albumKeywordsRef [] = $albumInfos->getCollection() ;
       $albumKeywordsRef [] = $nomEditeur;
       
       $this->view->albumKeywordsRef = implode( ' , ', $albumKeywordsRef);

        $this->view->headOpenTag = '<head prefix="og: http://ogp.me/ns# book: http://ogp.me/ns/book#">';

		$title = ucfirst(strtolower($albumInfos->getCollection()));
        if (strlen($title.' #'.$albumInfos->getTome()) < 70) {
        	$title .= $albumInfos->getTome() != '' ? ' #'. $albumInfos->getTome() : '';
       	}
        if (strlen($title.$albumInfos->getTitre()) < 70) {
        	$title .= ' '.ucfirst(strtolower($albumInfos->getTitre()));
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
        $this->view->headMeta()->setProperty('book:isbn', $albumInfos->getIsbn());
        foreach ($albumKeywordsRef as $kw) {
            $this->view->headMeta()->appendProperty('book:tag', $kw);
        }
        $this->view->headMeta()->setProperty('og:image', 'http://'.$_SERVER['HTTP_HOST'].$this->view->customUrl( array('isbn' => $albumInfos->getIsbn(), 'format' => 'small'), 'couverture'));
        $this->view->headMeta()->setProperty('og:description', $this->view->albumDescription);

       /*
        * On cherche une galerie associé
        */
       $mapperTblAlbumDossier = new Core_Model_Mapper_Tblalbumsdossier();
       $modelTblAlbumDossier  = $mapperTblAlbumDossier->fetchAll(3, array('clause' => 'idAlbum = ?', 'params' => $idAlbum) , 'dateCreation DESC' );
  
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
                                                    array( 'clause' => 'enligne = ? AND idAlbum = ' . $idAlbum, 
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
    
    /*
     * // mise à jour des visites de l'album
     * ExecRequete("UPDATE tbl_Album SET visites = visites + 1, visitesSemaine = visitesSemaine + 1 
     * WHERE idAlbum = ".$album->idAlbum, $connexion);
	

	// Recherche des dessinateurs
	$filtreinterview = array();
	$auteur = "";
	$i = 0;
	$requete = "SELECT t1.*, t2.nomAuteur, t2.prenomAuteur 
     * FROM tbl_Auteurs_Albums t1, tbl_Auteurs t2 
     * WHERE t1.idAlbum = '$idAlbum' 
     * and t1.cdRole = 'D' AND t1.idAuteur=t2.idAuteur";
     */
    
    /*
     * //recherche de l editeur
     * $requete = "SELECT * FROM tbl_Editeur WHERE idEditeur = '$album->FKidEditeur'";
     */
    
    /*
     * 	// recherche de l'univers
     * $idUnivers = ($album->idUnivers <> '') ? $album->idUnivers : $album->idUniversSerie;
     * SELECT * FROM tbl_Univers WHERE idUnivers = '$idUnivers
     */
    
    /*
     * // on va chercher tous les genres avec définition
     * SELECT * FROM tbl_Genres WHERE definition != ''";
     */
    
    /*
     * // Recherche du nombre d'internautes l'ayant de leur bdthèque
     * SELECT count(*) AS nbenr FROM tbl_Member_Bdtheque 
     * WHERE idAlbum = '$idAlbum' AND etat<>1";
     */
    
    /*
     * 	// recherche du nombre d'internautes l'ayant dans leur BDthèque
     * $requete = 'SELECT etat, COUNT(etat) AS nb
     * FROM tbl_Member_Bdtheque
     * WHERE idAlbum = '.$album->idAlbum.'
     * GROUP BY etat';
     */
    
    /*
     * 	// Recherche des prix de cet album
     * $requete = "SELECT t1.annee, t2.nomPrix, t3.nomFestival, t3.lienOpale 
     * FROM tbl_Albums_Prix t1, tbl_Festival_Prix t2, tbl_Festival t3 
     * WHERE t1.idAlbum = '$idAlbum' 
     * AND t1.idPrix = t2.idPrix AND t2.idFestival = t3.idFestival 
     * ORDER BY t3.nomFestival, t1.annee, t2.nomPrix";
     */
    
    /*
     * // Recherche du resume album
     * $requete7 = "SELECT t1.*, t2.pseudo 
     * FROM tbl_Histoire t1, tbl_Internaute t2 
     * WHERE t1.idAlbum = '$album->idAlbum' 
     * AND t1.idInternaute = t2.idInternaute";
     */
    
    /*
     * 	// Recherche de la critique de l'album internaute
     * $requete8 = "SELECT t1.*, t2.pseudo 
     * FROM tbl_Critique t1, tbl_Internaute t2 
     * WHERE (t1.idAlbum = '$album->idAlbum') 
     * AND (t1.active = 1) 
     * AND t1.idInternaute = t2.idInternaute 
     * order by t1.datecreation asc";
     */
    
    /*
     * 	// recherche des critiques sur le forum
     * $connexion2 = Connexion (NOM3, PASSE3, BASE3, SERVEUR3);
     * $requete = "SELECT * FROM  tbl_Forum_posts WHERE (topic_id = '$album->topic_id')";
     */
    
    /*
     * // Recherche des mots clef
     * // (genre)
     * $requete = "SELECT t1.* FROM tbl_Genres t1, tbl_Genres_Albums t2 
     * WHERE t1.idGenre = t2.idGenre 
     * AND t2.idAlbum = '$album->idAlbum' 
     * order by t1.libelle";
     */
    
    /*
     * // Recherche des prix de ses album
     * $requete = "SELECT DISTINCT  t1.annee, t2.nomPrix, t3.nomFestival
     * FROM tbl_Albums_Prix t1, tbl_Festival_Prix t2, tbl_Festival t3, tbl_Album t5
     * WHERE t1.idPrix = t2.idPrix
     * AND t1.idAlbum = t5.idAlbum
     * AND t2.idFestival = t3.idFestival
     * AND t1.idAlbum = $album->idAlbum
     * ORDER BY t1.annee";
     */
    
    /*
     * 	// recherche des interviews
     * 
     * "t2.idAuteur = '$auteur->idAuteur'"
     * 
     * $filtreinterview = '('.implode(' OR ', $filtreinterview).')';
     * $requete = "SELECT DISTINCT t1.* 
     * FROM tbl_Interviews t1, tbl_Auteurs_Interview t2 
     * WHERE t2.idInterview = t1.idInterview AND t1.enligne = 'O' 
     * AND $filtreinterview 
     * ORDER BY t1.dateInterview DESC";
     */
    
    /*
     * 	// recherche des galeries
     * $requete = "SELECT *
     * FROM tbl_Dossiers t1, tbl_Albums_Dossier t2
     * WHERE t2.idAlbum = ".$album->idAlbum."AND t1.idDossier = t2.idDossier
     * AND t1.enligne = 'O'
     * ORDER BY dateDossier DESC";
     */
    
    /*
     * // recherche des expos
     * $requete = "SELECT *
     * FROM tbl_Expos
     * WHERE enligne = 'O'";
     */
    
    /* 	
     * // MODULE CONCOURS
     * $requete = 'SELECT DISTINCT nomConcours, entete
     * FROM tbl_Concours_Ent
     * WHERE dateFin > CURDATE()';
     */
    
    /*
     * // Recherche des autres albums dans la même série
     * / limité à 11 albums : 5 avant, 5 après (pas encore géré)
     * if ($album->idSerie != "")
     * {
     * $requete71 = "SELECT t1.idAlbum, t1.titre, t1.tome, t1.collection, right(concat('000',t1.tome),3) AS tome1 
     * FROM tbl_Album t1 WHERE t1.idAlbum != '$album->idAlbum' 
     * AND t1.idSerie = '$album->idSerie' AND enligne = 'O' 
     * ORDER by tome1";
     */
    
    /*
     * // un auteur au hasard
     * $requete = "SELECT t1.*, t2.* 
     * FROM tbl_Auteurs_Albums t1, tbl_Auteurs t2 
     * WHERE t1.idAlbum = '$idAlbum' AND t1.idAuteur=t2.idAuteur 
     * AND (t2.biographie != '' OR t2.biographie != NULL)";
     */
    
    /*
     * // Découvrez aussi...
     * 		// un autre album du (des) même genre
		
		// les genres
		$i = count($genres_album);
		$cond_in = '0';
		for ($j=0; $j<$i; $j++) {
			$cond_in .= $genres_album[$j];
			if ($j < $i-1) $cond_in .= ', ';
		}
		$requete = "SELECT t2.idAlbum, t2.isbn, t2.collection, COUNT(t2.idAlbum) as nb FROM tbl_Genres_Albums t1, tbl_Album t2
					WHERE t1.idAlbum = t2.idAlbum
					AND t1.idGenre IN ($cond_in)
					AND t2.enligne = 'O'";
		// pas la série
		if ($album->idSerie != "") {
			$requete .= " AND t2.idAlbum NOT IN (SELECT idAlbum FROM tbl_Album 
     * WHERE idSerie = ".$album->idSerie.")";
		}
		$requete .= " AND t2.idAlbum != ".$album->idAlbum." 
     * GROUP BY t2.idAlbum ORDER by nb DESC";
		$resultat = ExecRequete ($requete,$connexion);
		$nb_genres = mysql_num_rows($resultat);

     */
    
    /*
     * // partie ajout à la bibliothèque Membre
	if (($userdata['user_id'] != '') AND ($userdata['user_id'] != '-1'))
	{
		$requete = "SELECT etat FROM tbl_Member_Bdtheque WHERE user_id='".$userdata['user_id']."' AND idAlbum=".$idAlbum;

     */
    
    /*
     * // partie jeu
	$anagrammeok=FALSE;
	if (isset($userdata['espace_ludique']) && $userdata['espace_ludique']==1)
	{
		//$connexion = Connexion (NOM, PASSE, BASE, SERVEUR);
		$requete = "SELECT idAlbum FROM tbl_Member_Jeu_Param WHERE date=CURDATE() AND idjeu='ANAG'";
		$resultat = ExecRequete ($requete, $connexion);
		if (mysql_num_rows($resultat) == 1)
		{
			$album = LigneSuivante($resultat);
			$idAlbumExtrait = $album->idAlbum;
		}
		if ($idAlbumExtrait == $idAlbum)
		{
			$requete = "SELECT * FROM tbl_Member_Jeu_Reponses WHERE user_id='".$userdata['user_id']."' AND date=CURDATE() AND idjeu='ANAG'";
			$resultat = ExecRequete ($requete, $connexion);
			if (mysql_num_rows($resultat) == 0)
			{
				// gagné!!! l'extrait à été trouvé
				$requete = "INSERT INTO tbl_Member_Jeu_Reponses (user_id, date, idjeu, idAlbum, date_reponse)"
				.  " VALUES ('".$userdata['user_id']."',CURDATE(),'ANAG','$idAlbum',NOW())";
				$resultat = ExecRequete ($requete, $connexion);
				$anagrammeok=TRUE;
			}
		}
	}
     */
