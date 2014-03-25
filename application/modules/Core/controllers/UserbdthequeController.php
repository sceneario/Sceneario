<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class userbdthequeController extends Zend_Controller_Action
{
    public function init()
    {
        //
        if(!Zend_Registry::isRegistered('currentUserID')){
            exit('USER_DECONNEXION');
        }
    }
    
    private function noView()
    {
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true); 
    }
    
    

    /**
     * 
     */
    public function addtobdthequeAction()
    {
        $this->noView();
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
        {
            $bdId   = (int)$this->getRequest()->getParam('bdid');

            if($bdId !== 0){
                $tblUserBdtekMapper = new Core_Model_Mapper_TblUserBdthequeV6();
                $userData = new stdClass();
                
                $userData->user_id  = (int)Zend_Registry::get('currentUserID') ;
                $userData->bdid_to_add = $bdId;
                
                $userData->type = 'list_album_to_buy';
                
                //si l'album existe dans la liste des albums possédés
                //il est supprimé
                if( !$tblUserBdtekMapper->albumNotExist($userData) ){
                    $rowInfo = $tblUserBdtekMapper->albumNotExist($userData, false);
                    #Zend_Debug::dump($rowInfo);
                    foreach($rowInfo as $r){
                        $tblUserBdtekMapper->delete($r->getId());
                    }
                    
                }
                
                $userData->type = 'list_my_album';
                
                $tblUserBdtek = new Core_Model_TblUserBdthequeV6();
                $tblUserBdtek->setUserid($userData->user_id)
                             ->setAlbumid($userData->bdid_to_add)
                             ->setType($userData->type);

                
                if($tblUserBdtekMapper->albumNotExist($userData)){
                    if($tblUserBdtekMapper->save($tblUserBdtek)){
                        exit('1') ;
                    }else{
                        exit('0') ;
                    }
                } 
                exit('0');
            }
        }else{
            exit(':/');
        }
    }
    
    /**
     * 
     */
    public function addtolistachatbdthequeAction()
    {
        $this->noView();
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
        {

            $bdId   = (int)$this->getRequest()->getParam('bdid');

            if($bdId !== 0){
                
                
                $tblUserBdtekMapper = new Core_Model_Mapper_TblUserBdthequeV6();
                $userData = new stdClass();
                
                $userData->user_id  = (int)Zend_Registry::get('currentUserID') ;
                $userData->bdid_to_add = $bdId;
                $userData->type = 'list_my_album';
                
                //si l'album existe dans la liste des albums possédés
                //il est supprimé
                if( !$tblUserBdtekMapper->albumNotExist($userData) ){
                    $rowInfo = $tblUserBdtekMapper->albumNotExist($userData, false);
                    #Zend_Debug::dump($rowInfo);
                    foreach($rowInfo as $r){
                        $tblUserBdtekMapper->delete($r->getId());
                    }
                    
                }
                
                $userData->type = 'list_album_to_buy';
           
                $tblUserBdtek = new Core_Model_TblUserBdthequeV6();
                $tblUserBdtek->setUserid($userData->user_id)
                             ->setAlbumid($userData->bdid_to_add)
                             ->setType($userData->type);
 
                if($tblUserBdtekMapper->albumNotExist($userData)){
                    if($tblUserBdtekMapper->save($tblUserBdtek)){
                        exit('1') ;
                    }else{
                        exit('0') ;
                    }
                } 
                exit('0');
            }
        }else{
            exit(':/');
        }
    }
    
    /**
     * 
     * @return boolean
     */
    public function deleteAction()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
        {
            if(Zend_Registry::isRegistered('currentUserID')){
                $userID  = Zend_Registry::get('currentUserID');
                $albumId = $this->getRequest()->getParam('id');
                $bdteckV6Mapper = new Core_Model_Mapper_TblUserBdthequeV6();
                $album = $bdteckV6Mapper->fetchAll(null, array('clause'=> 'user_id = ? AND album_id =' . $albumId , 'params' => $userID) , null);
                if($bdteckV6Mapper->delete($album[0]->getId())){
                    exit("1");
                }
                exit("0");
            }
            exit("0");
        }
        exit("0");
    }
}