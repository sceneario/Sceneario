<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class ConcoursController extends GlobalController 
{
    
    private $_concoursMapper ;
    
    public function init()
    {
        parent::init();
        #$oldPageConcours = 'http://www.sceneario.com/sceneario_concours_sommaire.php';
        //echo '<script>window.open("' . $oldPageConcours . '", "Concours Sceneario.com ", "blank")</script>' ;
        #echo '<script>document.location.href="' . $oldPageConcours . '"</script>' ;
        $this->_concoursMapper = new Core_Model_Mapper_Tblconcoursent ;
        $this->view->headTitle('Concours BD - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Participez aux concours Sceneario et gagnez des BDs, des planches, ou encore les fameux "petits dessous" grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', 'Concours, Concours BD, BD gratuites, gagner BD, concours planches');
        $this->view->headMeta()->setProperty('og:title', 'Concours BD - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Participez aux concours Sceneario et gagnez des BDs, des planches, ou encore les fameux "petits dessous" grâce à Sceneario.com');
        
    }
    
    public function indexAction(){}
    
    /*
     * Page globale referencant les derniers articles
     */
    public function listAction()
    {
        $concoursEnCours = $this->_concoursMapper->fetchAll(100, 
                                                           array( 'clause' => 'enligne = ? AND dateFin >= CURDATE()',
                                                                  'params' => IS_PUBLISHED),
                                                          'dateFin ASC') ;
        /*
         * Injection dans la vue
         */
        $this->view->concoursEnCours = $concoursEnCours ;
        
        
        /*
         * Concours précédents
         */
         $concoursPrecedents = $this->_concoursMapper->fetchAll(11,
                                                                array( 'clause' => 'enligne = ? AND dateFin < CURDATE()',
                                                                       'params' => IS_PUBLISHED),
                                                               'dateFin DESC') ;
         
         $this->view->concoursPrecedents = $concoursPrecedents;
         
         $a = array();
         $b = array();
         $c = array();
         
         foreach($concoursPrecedents as $key => $conc){
              
             if($key % 3 ==  0 ) {
                 $a[] = $conc ;
             }
            
             if($key % 3 ==  1 ) {
                 $b[] = $conc ;
             }
             
             if($key % 3 ==  2 ) {
                 $c[] = $conc ;
             }
          
         }
         $concoursPrecedentsOrdered = array($a, $b, $c);
         $this->view->concoursPrecedentsOrdered = $concoursPrecedentsOrdered;
    }
    
    /*
     * Page d'enregistrement des reponses
     */
    public function concoursstep1Action()
    {
        $idConcours = $this->getRequest()->getParam('idConcours');
        $concoursEnCours = $this->_concoursMapper->find($idConcours, new Core_Model_Tblconcoursent);
        $this->view->concoursEnCours = $concoursEnCours ;
        
        #     echo '<pre>';
        #print_r($concoursEnCours);
        
        //Récupération des questions du concours
        $concoursQuestionMapper = new Core_Model_Mapper_Tblconcourslig ;
        $concoursQuestion       = $concoursQuestionMapper->fetchAll(null, array('clause' => 'nomConcours = ? AND dateQuestion = CURDATE()', 
                                                                                'params' => $idConcours ) , 
                                                                    'numQuestion ASC');
        $this->view->concoursTermine = false ;
        #echo '<pre>';
        #print_r($concoursQuestion);
        
        if(count($concoursQuestion) == 0){
            //pas de question - concours terminé
            $this->view->concoursTermine = true;
        }
        

        $albumMapper = new Core_Model_Mapper_Tblalbum();
        $this->view->album_related = $albumMapper->find($this->view->concoursEnCours->getIdAlbum(), new Core_Model_Tblalbum()) ;

        $this->view->concoursQuestion = $concoursQuestion ;

        $imageFacebook = '/images/concours/' . $concoursEnCours->getNomConcours() . '.jpg' ;
        $this->view->headTitle($concoursEnCours->getLibelleConcours().' - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Participez au concours et gagnez '.$concoursEnCours->getLibelleConcours().' grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', $concoursEnCours->getLibelleConcours().', concours, Concours BD');
        $this->view->headMeta()->setProperty('og:title', $concoursEnCours->getLibelleConcours());
        $this->view->headMeta()->setProperty('og:image', 'http://'.$_SERVER['HTTP_HOST'].(file_exists(ROOT_PATH.PUBLIC_DIR.$imageFacebook) ? $imageFacebook : '/img/temp/scev6-tempconcours.jpg'));
        $this->view->headMeta()->setProperty('og:description', 'Participez au concours et gagnez '.$concoursEnCours->getLibelleConcours().' grâce à Sceneario.com');
    }
    
    /*
     * Page d'enregistrement des coordonnées
     */
    public function concoursstep2Action()
    {
        $this->getConcours();    
        
        #echo '<pre>';
        #print_r($_POST);
        #exit;
        
        if(isset($_POST['concours_process']['token'])){
            //permet juste de vérifier la continuité du process
            //mais peut etre utilisé avec une session pour vérifier que les étapes se suivent
            $tokenFromStep1       = $_POST['concours_process']['token'] ;
            $postConcoursReponses = array_map('strip_tags', $_POST['concours_reponses']);
            
            $this->view->concoursToken        = $tokenFromStep1;
            $this->view->postConcoursReponses = serialize($postConcoursReponses);

            $albumMapper = new Core_Model_Mapper_Tblalbum();
            $this->view->album_related = $albumMapper->find($this->view->concoursEnCours->getIdAlbum(), new Core_Model_Tblalbum()) ;
        }
        else{
            $this->_redirect($this->view->customUrl(array(), 'concours'));
            exit;
        }
    }
    
    /*
     * Page de validation d'enregistrement de participation
     */
    public function concoursstep3Action()
    {
        $this->getConcours();
       
        if(isset($_POST['concours_process']['token'])){
            if(isset($_POST['participant_serialized_reponses'])){
                
                
                $reponsesDateString = stripslashes($_POST['participant_serialized_reponses']);
				
                $postConcoursReponses = unserialize($reponsesDateString);
                $idConcours           = $this->getRequest()->getParam('idConcours');

                $albumMapper = new Core_Model_Mapper_Tblalbum();
                $this->view->album_related = $albumMapper->find($this->view->concoursEnCours->getIdAlbum(), new Core_Model_Tblalbum()) ;

                $concoursReponsesMapper = new Core_Model_Mapper_Tblconcoursreponses;
                $concoursReponsesModel  = new Core_Model_Tblconcoursreponses;
                
                $participantsDetails    = array_map('strip_tags', $_POST['participant_details']); 
                
                $concoursReponsesModel  -> setAdrIp       (@$_SERVER['REMOTE_ADDR'])
                                        -> setDateReponse (date('Y-m-d H:i:s'))
                                        -> setEmailReponse($participantsDetails['email'])
                                        -> setNomConcours ($idConcours)
                                        -> setReponse1    ($postConcoursReponses['reponse_q_1'])
                                        -> setReponse2    ($postConcoursReponses['reponse_q_subsidiaire'])
                                        -> setReponse3    ($participantsDetails['nom'] . ' ' . $participantsDetails['prenom'] )
                                        -> setReponse4    ($participantsDetails['adresse']) //adresse
                                        -> setReponse5    ($participantsDetails['cp'])      //cp
                                        -> setReponse6    ($participantsDetails['ville'])   //ville
                                        -> setReponse7    (null)
                                        -> setReponse8    (null);
                
                /*
                 * SELECT * 
                 * FROM dev_sceneario.tbl_Concours_Reponses  
                 * WHERE STR_TO_DATE(dateReponse, '%Y-%m-%d') = CURDATE() 
                 * //on recupere la date sans les heures pour comparer avec le jour courant
                 * AND emailReponse = "courtin.david@gmail.com" 
                 * AND nomConcours = 'ASENA' 
                 * ORDER BY dateReponse DESC ;
                 */
                
                $optionsRequete = array('clause'=>" emailReponse = ? 
                                                    AND STR_TO_DATE(dateReponse, '%Y-%m-%d') = CURDATE()
                                                    AND nomConcours = '". $concoursReponsesModel->getNomConcours() ."'" , 
                                        'params'=> $concoursReponsesModel->getEmailReponse());

                                                                                                           
                
                $checkIfUserHaveEverAnswered = $concoursReponsesMapper->fetchAll(1, $optionsRequete ,  null);
                
                $presenceReponse = count($checkIfUserHaveEverAnswered);
                
                if($presenceReponse > 0){
                     $message = 'Vous avez d&eacute;j&agrave; r&eacute;pondu à la question d\'aujourd\'hui.';
                }else{
                      if($concoursReponsesMapper->save($concoursReponsesModel)){
                          $message = 'Votre participation a bien &eacute;t&eacute; prise en compte, merci et bonne chance.';
                      }else{
                          $message = 'Une erreur est survenue lors de l\'enregistrement de votre participation,<br />
                            veuillez r&eacute;essayer ultérieurement.';
                      }
                }
                $pageConcours = $this->view->customUrl(array(), 'concours');

                $this->view->message = $message .'<br /><a href="'.$pageConcours.'">Retour &agrave; la page des concours</a>' ;
            }
        }
        else{
           $this->_redirect($this->view->customUrl(array(), 'concours'));
           exit;
        }
    }
    
    /*
     * Pages des reglements
     */
    public function concoursreglementAction()
    {
        $this->getConcours();

        $albumMapper = new Core_Model_Mapper_Tblalbum();
        $this->view->album_related = $albumMapper->find($this->view->concoursEnCours->getIdAlbum(), new Core_Model_Tblalbum()) ;
    }
    
    /*
     * Retourne le concours ciblé
     * Vérifie le referer pour un bon déroulement du process
     */
    public function getConcours()
    {
        $utils = new Core_Service_Utilities;
        $idConcours = $this->getRequest()->getParam('idConcours');

        /*
         * On verifier si le referer contient l'id du concours
         * sinon on redirige vers la page des concours 
         */
        if(strpos($utils->getReferer(), $idConcours ) == false) {
            $this->_redirect($this->view->customUrl(array(), 'concours'));
            exit;
        }
        $concoursEnCours = $this->_concoursMapper->find($idConcours, new Core_Model_Tblconcoursent);
        $this->view->concoursEnCours = $concoursEnCours ;
    }
}