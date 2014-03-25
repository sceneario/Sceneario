<?php

class Zend_View_Helper_Banner extends Core_Model_DbTable_Db
{
   /*
    * Partie privee : les variables
    */
   private $nomBanniere;
   private $codeBanniere;
   private $T_actif;
   private $mode;
   private $type;
   private $plage_min;
   private $plage_max;
   private $nb_affichages_site;
   private $nb_affichages_forum;
   private $nb_affichages_jeu;
   private $type_affichage;
   private $T_Stat_Clic;
   private $commentaire;
   private $nb_clics;
   private $url_redirect;
   private $format;
    
   /*
    * Partie privee : les methodes 
    */
   
   //$this->Banner('Generation2' , "S", 3, 2  );
   //format bannière, 0=horizontale, 1=verticale, 2=habillage, 3=carre
   public function banner( $action, $origine, $format = 0 , $nbre = 1 ){
       return call_user_func(array( $this, $action ) , $origine, $format, $nbre ) ;
   }
   
   /*
    * 
    */
   public function populateObj ($nomBanniere = "", $pmode = "")
   {
      $this->nomBanniere        = $nomBanniere;
      $this->codeBanniere       = "";
      $this->T_actif            = "N";
      $this->mode               = $pmode;
      $this->type               = "banniere";
      $this->plage_min          = 0;
      $this->plage_max          = 100;
      $this->nb_affichages_jeu  = 0;
   }
   
   /*
    * Retourne une banniere correspondante à certaines conditions
    * Met à jour le nbre de vue dans la base
    * 
    * @var string $origine
    * @var int    $format optionel
    * @var int    $nombre optionel
    */
   private function bannerGeneration($origine, $format = 0, $nombre = 1)
    {
       $ipFilter = new Core_Service_IpFilter();
       $plage    = 100 / $nombre;
       for ($i = 1; $i <= $nombre; $i++)
       {
            $rd = rand($plage * ($i-1), $plage * $i);
            #echo 'plage : ' , $plage , 'rand : ' ,$rd ;
            $sql = "SELECT *
                    FROM   tbl_Banniere
                    WHERE  T_actif ='O'
                    AND    type_affichage like '%$origine%'
                    AND    format = '$format'
                    AND    $rd between plage_min and plage_max ;";
            
            //echo $sql;

            $results = $this->getSqlResults($sql, array());
            #var_dump($results);
            if(count($results)>0){
                #echo '<pre>';
                
                $this->populateObj($results[0]->nomBanniere, 'M');
                
                
                if ($this->searchBannerInBase() !== null)
                {
                   //var_dump($this->searchBannerInBase());
                   $bannerInfos =  $this->searchBannerInBase();                  
 
                   if ( $ipFilter->isSpecialIp() === false )
                   {
                      // Mise a jour des stats d'affichages
                      switch ($origine)
                      {
                         case "S":
                            $currentAffichageSite  = $bannerInfos->getNb_affichages_site();
                            $bannerInfos->setNb_affichages_site($currentAffichageSite++);
                            break;
                         case "F":
                            $currentAffichageForum = $bannerInfos->getNb_affichages_forum();
                            $bannerInfos->setNb_affichages_forum($currentAffichageForum++);
                            break;
                         case "J":
                            $currentAffichageJeu   = $bannerInfos->getNb_affichages_jeu();
                            $bannerInfos->setNb_affichages_jeu($currentAffichageJeu++);
                            break;
                      }
                      #$this->Insertion();
                   }  
                }
                else{
                
                }
            }
       }
       return $results;      
    }
    
    /*
     * // PUB CARREE sur l'index - wtf ? 
	
	// GESTION PUB CARREE
	$requete = "select * from tbl_Banniere where format=3 and T_actif='O'";
	$resultat = ExecRequete ($requete, $connexion);
	$pubs = array();
	$i = 0;
	while ($pub = LigneSuivante($resultat)) {
		$idPubs[$i] = $pub->nomBanniere;
		$pubs[$i]   = $pub->codeBanniere;
		$i++;
	}
	// selection pub aleatoire
	$i = rand(0, count($pubs)-1);
	$template->assign_block_vars('switch_pub_bas', array(
		"PUB" => $pubs[$i]
		)
	);
	if (!is_special_ip())
        {
                $requete  = 'UPDATE tbl_Banniere set nb_affichages_site=nb_affichages_site+1 ';
		$requete .= 'where nomBanniere="'.$idPubs[$i].'"';
                execRequete($requete, $connexion);
        }
     */
    
   /*
    * Methode qui trouve l'objet en base 
    */
   private function searchBannerInBase() {
      #$sql = "SELECT * FROM tbl_Banniere 
      #        WHERE nomBanniere = '$this->nomBanniere'" ;
      $bannerMapper = new Core_Model_Mapper_Tblbanniere();
      $bannerInfos  = $bannerMapper->find($this->nomBanniere, new Core_Model_Tblbanniere());
  
      return $bannerInfos;
      echo '<pre>';
      print_r($bannerInfos->ge);
      #exit();
      #$results = $this->getSqlResults($sql, array()) ;
     /*
      if($results == null){
         return false;
      }
      
      $tmp =  $results[0] ;

      $this->nomBanniere         = $tmp->nomBanniere;
      $this->codeBanniere        = $tmp->codeBanniere;
      $this->type_affichage      = $tmp->type_affichage;
      $this->T_actif             = $tmp->T_actif;
      $this->plage_min           = $tmp->plage_min;
      $this->plage_max           = $tmp->plage_max;
      $this->nb_affichages_site  = $tmp->nb_affichages_site;
      $this->nb_affichages_forum = $tmp->nb_affichages_forum;
      //$this->nb_affichages_jeu   = $tmp->nb_affichages_jeu;
      $this->T_Stat_Clic         = $tmp->T_Stat_Clic;
      $this->commentaire         = $tmp->commentaire;
      $this->nb_clics            = $tmp->nb_clics;
      $this->url_redirect        = $tmp->url_redirect;
      $this->format              = $tmp->format;
      #echo '<pre>';
      #var_dump($tmp);
      */
      return true;     
   } 

    
   //Methode d'insertion dans la base de l'objet
   private function Insertion($stats="N")
   {
        if ($this->mode != "M") {
            $requete  = "INSERT INTO tbl_Banniere (nomBanniere,codeBanniere, T_actif, plage_min, ";
            $requete .= "plage_max, nb_affichages_site, nb_affichages_forum, nb_affichages_jeu,  ";
            $requete .= "type_affichage, T_Stat_Clic, commentaire, nb_clics, url_redirect, format) ";
            $requete .= "VALUES ('$this->nomBanniere','$this->codeBanniere', '$this->T_actif', ";
            $requete .= "'$this->plage_min', '$this->plage_max', '$this->nb_affichages_site', ";
            $requete .= "'$this->nb_affichages_forum', '$this->nb_affichages_jeu', '$this->type_affichage', ";
            $requete .= "'$this->T_Stat_Clic' , '$this->commentaire', '$this->nb_clics', ";
            $requete .= "'$this->url_redirect', '$this->format')";
         }
         elseif ($stats == "O") {
              $requete  = "UPDATE tbl_Banniere set ";
              $requete .= "nb_affichages_site  = ".$this->nb_affichages_site.", ";
              $requete .= "nb_affichages_forum = ".$this->nb_affichages_forum.", ";
              //$requete .= "nb_affichages_jeu   = ".$this->nb_affichages_jeu.", ";
              $requete .= "type_affichage      = '".$this->type_affichage."', ";
              $requete .= "T_Stat_Clic         = '".$this->T_Stat_Clic."', ";
              $requete .= "nb_clics            = ".$this->nb_clics.", ";
              $requete .= "WHERE nomBanniere   = '".$this->nomBanniere."'";
         

         }
         else {
            $requete  = "UPDATE tbl_Banniere set ";
            $requete .= "codeBanniere        = '".addslashes(stripslashes($this->codeBanniere))."', ";
            $requete .= "T_actif             = '".$this->T_actif."', ";
            $requete .= "plage_min           = ".$this->plage_min.", ";
            $requete .= "plage_max           = ".$this->plage_max.", ";
            $requete .= "nb_affichages_site  = ".$this->nb_affichages_site.", ";
            $requete .= "nb_affichages_forum = ".$this->nb_affichages_forum.", ";
            //$requete .= "nb_affichages_jeu   = ".$this->nb_affichages_jeu.", ";
            $requete .= "type_affichage      = '".$this->type_affichage."', ";
            $requete .= "T_Stat_Clic         = '".$this->T_Stat_Clic."', ";
            $requete .= "commentaire         = '".addslashes(stripslashes($this->commentaire))."', ";
            $requete .= "nb_clics            = ".$this->nb_clics.", ";
            $requete .= "url_redirect        = '".$this->url_redirect."', ";
            $requete .= "format              = ".$this->format." ";
            $requete .= "WHERE nomBanniere   = '".$this->nomBanniere."'";
         }

         echo $requete ;
        # $result = $this->getDb()->exec($requete);

        # return $result;
   }

}