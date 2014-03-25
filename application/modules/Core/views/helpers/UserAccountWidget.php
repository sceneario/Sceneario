<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Zend_View_Helper_UserAccountWidget 
{
    public function userAccountWidget($type = 'user_connect_shortcut')
    {
        
        $facebookConnect = Core_Service_FacebookConnect::getInstance();
        $googleConnect   = Core_Service_GoogleConnect::getInstance();
        
        
        if($type == 'user_connect_shortcut'){
            
        
            $words  = 'se connecter';
            $url    = 'javascript:void(0);';
            /*
             * La connexion se fait grâce à la class Core_Service_FacebookConnect
             */          
           
            if($facebookConnect->isConnected () || $googleConnect->isConnected()){
                 $url   = '/' . '?logout';
                 $words = 'déconnexion';
            }
            
            $facebookLogUrl = '/auth/facebook';
            
            $googleLogUrl   = '/auth/google';
            
            $menuConnect  = '';
            $menuConnect .= '<div id="btns-connect">';
            $menuConnect .= sprintf( '<a href="%s" class="btn_mauve"><img src="' 
                                      . BASE_URL . 'img/header_connect_icon.png" alt="">&nbsp;%s</a>' , $url, $words  );
            
            if( !$facebookConnect->isConnected () && !$googleConnect->isConnected ()){
                $menuConnect .= '<ul>';
                $menuConnect .= '<li><a id="btn-fb" href="' . $facebookLogUrl . '"><img src="'. BASE_URL . 'img/icon-connexion/header_nav_connect_fb.png"/>&nbsp;avec Facebook</a></li>';
                $menuConnect .= '<li><a id="btn-google" href="' . $googleLogUrl . '"><img src="'. BASE_URL . 'img/icon-connexion/header_nav_connect_google.png"/>&nbsp;avec Google</a></li>';
                $menuConnect .= '</ul>';
            }
            
            $menuConnect .= '</div>';
            
            echo $menuConnect ; 
        }
        
        
        if($type == 'user_dashboard'){
            
            $utils = new Core_Service_Utilities;
            if(Zend_Registry::isRegistered('currentUserID')){
             
                $userId = Zend_Registry::get('currentUserID');
                $tblUserBdthequeV6     = new Core_Model_Mapper_TblUserBdthequeV6();
                $countAlbumInListAchat = $this->formatNumber($tblUserBdthequeV6->getBdthequeAlbumCount($userId , 'list_album_to_buy'));
                $countAlbum            = $this->formatNumber($tblUserBdthequeV6->getBdthequeAlbumCount($userId , 'list_my_album' ));
                
                $bdtekAlbums = $tblUserBdthequeV6->fetchAll(null, array('clause'=> 'user_id = ? AND type = "list_my_album"' , 'params'=> $userId ) ,null);
                
                $albumMapper = new Core_Model_Mapper_Tblalbum();
                $totalManquants = '0000';
                $series = array();
                foreach($bdtekAlbums as $bdtekAlbum){
                    $album = $albumMapper->find($bdtekAlbum->getAlbumid(), new Core_Model_Tblalbum) ;
                    $serie = $albumMapper->getCountAlbumFullSerie($album->getIdSerie());

                    if(count($serie) > 0 ){
                        $series[$album->getIdSerie()]['albums'][$bdtekAlbum->getAlbumid()] = $bdtekAlbum->getAlbumid();
                        $series[$album->getIdSerie()]['total_album_dans_serie'] = $serie->TOTAL ;
                    } 
                }
                
                $totalManquants = '';
                foreach($series as $serie){
                    $countAlbumPresentDansBdtek = count($serie['albums']);
                    $totalManquants += ($serie['total_album_dans_serie'] - $countAlbumPresentDansBdtek) ;
                }
                
                $totalManquants = $this->formatNumber($totalManquants);
                
                //$albumMapper->getAlbumFullSerie(2760)
                #Zend_Debug::dump($totalManquants);
                #exit;
                
                echo '
                <!-- Mon compte -->
                <div id="bedetheque-import" class="whiteblock300">
                    <header>
                        <h1>Importer mon ancienne bédéthèque</h1>
                    </header>
                    <div class="alert"></div>
                    <form action="/bande-dessinee/bedetheque/import" method="POST">
                        <input type="text" name="old_user_id" placeholder="Votre ancien pseudo" value="" />
                        <input type="hidden" name="user_id" value="'.$userId.'" />
                        <input class="more" type="submit" value="Importer">
                    </form>
                    <script type="text/javascript">
                      $(document).ready(function() {
                        $("#bedetheque-import form").submit(function(e) {
                          $("#bedetheque-import .alert").hide();
                          $("#bedetheque-import .alert").removeClass("success");
                          $("#bedetheque-import .alert").removeClass("error");
                          $.post($(this).attr("action"), $(this).serialize(), function(ret) {
                            var data = jQuery.parseJSON(ret);
                            $("#bedetheque-import .alert").addClass(data.status == true ? "success" : "error");
                            $("#bedetheque-import .alert").html(data.message);
                            $("#bedetheque-import .alert").show();
                          });
                          e.preventDefault();
                          return false;
                        });
                      });
                    </script>
                </div>
               <section class="mon-compte" id="widget-ma-bdtheque">
                       <h1><img src="/img/user.png" alt="">Mon compte</h1>
                       <ul>
                               <li>Albums dans ma bédéthèque <span>'.$countAlbum.'</span></li>
                               <li>Albums à acheter <span>'.$countAlbumInListAchat.'</span></li>
                               <li>Albums manquants<span>'.$totalManquants.'</span></li>
                       </ul>
                       <a href="'.$utils->_getView()->customUrl(array('tag'=>'bedetheque'), 'listalbum').'">Accéder à ma bédéthèque</a>
               </section>';
   
            }
        }
    }
    
    
     public function formatNumber( $nb  )
    {
        $nbLen = strlen((String)$nb);
        $zero  = '';
        if($nbLen < 4){
            for($i = 0 ; $i < 4 - $nbLen ; $i++ ){
                $zero .= '0';
            }
        }
        return $zero . (string)$nb ; 
    }
   
    
    protected function providerDataToScenearioObject($providerData)
    {
        $coreUserV6 = new Core_Model_TblUserV6;
        $coreUserV6->setUserlastname($providerData->last_name)
                   ->setUserfirstname($providerData->first_name)
                   ->setUsername($providerData->username)
                   ->setUserwebsite($providerData->website)
                   ->setUserfrom($providerData->user_from)
                   ->setUseractkey($providerData->act_key)
                   ->setUserip($_SERVER['REMOTE_ADDR'])
                   ->setUserlang($providerData->lang)
                   ->setUsertimezone($providerData->user_timezone)
                   ->setUseractive(1);
        
        
        return $coreUserV6 ;
    }
}
