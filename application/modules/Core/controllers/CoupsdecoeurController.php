<?php

class CoupsdecoeurController extends Zend_Controller_Action 
{
    public function indexAction()
    {
        $this->_forward('list');
    }
    
    public function listAction()
    {
        //methode getCoupsdecoeurAlbums dans album mapper
    }
    
    public function setcoupdecoeurAction()
    {
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        
        $ipUser  = $_SERVER['REMOTE_ADDR'];
        
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { 
            
            $idAlbum = $this->getRequest()->getParam('id');
            
            
            if(!null == $idAlbum && !null == $ipUser){
                $mapperTblcoupdecoeurint = new Core_Model_Mapper_Tblcoupdecoeurint();
                $modelTblcoupdecoeurint  = new Core_Model_Tblcoupdecoeurint();

                /*
                 * @todo setUser_id(null) ?
                 */
                $ipFilter  = new Core_Service_IpFilter();
                $infosUser = new stdClass();
                $infosUser->date        = date('Y-m-d H:i:s') ;
                $infosUser->id          = $idAlbum ;
                $infosUser->ip          = $ipUser;
                $infosUser->host        = $ipFilter ->getRemoteAddr('DOMAIN') ;
                $infosUser->semainevote = date('YW') ;
                $infosUser->userid      = -1 ;
                
                //UTILE POUR DEBUG
                //exit(json_encode($infosUser));
                
                $modelTblcoupdecoeurint ->setDateVote($infosUser->date)
                                        ->setIdAlbum ($infosUser->id) 
                                        ->setAdrIp   ($infosUser->ip) 
                                        ->setNomIp   ($infosUser->host) 
                                        ->setSemVote ($infosUser->semainevote) 
                                        ->setUser_id ($infosUser->userid) ;

                #echo '<pre>' ;
                #var_dump($this->userIsSpammer() );
                #echo '</pre>' ;

                if( !$this->userIsSpammer($idAlbum)) {
                    if( $mapperTblcoupdecoeurint->save($modelTblcoupdecoeurint) ){
                        //OK
                        echo '1' ;
                    }else{
                        //KO
                        echo '0' ;
                    }
                }else{
                     //KO
                    echo '0' ;
                } 
            }else{
                //KO
                echo '0' ;
            }
        }else{
           //KO
           $this->_redirect($this->view->customUrl(array(), 'accueil'));
        }
        
        #echo '<pre>';
        #print_r($_SERVER);
    }
    
    private function userIsSpammer($idAlbum)
    {
        $currentWeek             = date('YW');
        $mapperTblcoupdecoeurint = new Core_Model_Mapper_Tblcoupdecoeurint();
        $userVotes = $mapperTblcoupdecoeurint->findUserVote(new Core_Model_Tblcoupdecoeurint);
        
        foreach($userVotes as $userVote ){
            //si la semaine courante est egale à la semaine enreg en base
            //le user a deja voté cette semaine
            if((int)$currentWeek === (int)$userVote->semVote 
                    && (int)$idAlbum === (int)$userVote->idAlbum ){
                return true ;
            }
        }
        return false;
    }
}