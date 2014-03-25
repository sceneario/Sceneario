<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Zend_View_Helper_BuyThisBookButtons 
{
    const IZNEO_PATH = 'http://www.izneo.com/xml/albums.xml';
    const IZNEO_ID = '970';
    
    public function buyThisBookButtons ($isbn, $lienAmazon = "") 
    {
    
    
    
        $bdBuzzAvailability = new Core_Service_BdBuzzAvailability();
        try {
            $lienBdBuzz         = $bdBuzzAvailability->checkBdBuzzISBNAvailability($isbn);
        } catch (Exception $e) {
            // something went wrong with isbn
            // @todo : send email to alert someone ?
        }

         
        $priceMinister   = 'http://track.effiliation.com/servlet/effi.redir?id_compteur=12078843&url=http://www.priceminister.com/s/'.$isbn.'' ; 
        $bdFugue         = 'http://www.bdfugue.com/a/?ean='.$isbn.'&ref=14' ;
        $fnac            = 'http://ad.zanox.com/ppc/?12175452C2022213026T&ULP=[['.urlencode('www3.fnac.com/search/quick.do?category=book&text='.$isbn).']]' ;
        $izneo           = self::getIzneoLink($isbn);
        
        $bookButtons = array( 'Priceminister' => $priceMinister,
                              'BdFugue'       => $bdFugue,
                              'FNAC'          => $fnac,
                              ); // 'Amazon'        => $amazon,
        
        //amazon ready
        if($lienAmazon != ""){
            $amazon          = 'http://www.amazon.fr/exec/obidos/ASIN/' . $lienAmazon . '/sceneariocom-21' ;    
            $bookButtons = $bookButtons + array('Amazon' => $amazon) ;
        }
        
        //bdbuzz ready
        if(!empty($lienBdBuzz)){
            $bookButtons = $bookButtons + array('bdBuzz' => $lienBdBuzz) ;    
        }

        if($izneo !== false){
            $bookButtons['izneo'] = $izneo;    
        }
        
        $html = '<div class="acheter">';
        $html .= '<a href="javascript:void(0);">Acheter cet album</a>';
        $html .= '<ul>';
        
        if(isset($_GET['c']) && strtolower($_GET['c']) == 'fnac'  && isset($bookButtons['FNAC'])){
            $html .= '<li><a href="'.$bookButtons['FNAC'].'" target="_blank">FNAC</a></li>' ;
        }
        elseif(isset($_GET['c']) && strtolower($_GET['c']) == 'bdfugue'  &&  isset($bookButtons['BdFugue'])){
            $html .= '<li><a href="'.$bookButtons['BdFugue'].'" target="_blank">BdFugue</a></li>' ;
        }
        else{
           foreach($bookButtons as $keyButton => $url){
                $html .= '<li><a href="'.$url.'" target="_blank">'.$keyButton.'</a></li>' ;
            } 
        }
        
        $html .= '</ul>';
        $html .= '</div>';
        
        return $html;
        
        
    }

    public static function getIzneoLink($isbn) {
        $path = '/home/sceneari/'.(APPLICATION_ENV == 'testing' ? '_v6_testing' : 'v6').'/docs/albums-izneo.xml';
        if (!file_exists($path)) {
            echo self::updateIzneoFile();
        }
      
        $xmlStr = @file_get_contents($path); 
        
         //update mfw 29082013
		if(empty($xmlStr)){
	        return false;
        }
        
        $xml = new SimpleXMLElement($xmlStr); 
        $res = $xml->xpath('album/ean[.=\''.$isbn.'\']/parent::*'); 
        if (isset($res[0]) && $res[0]->id) {
            return 'http://www.izneo.com/read-'.$isbn.'-'.$res[0]->id.'-'.self::IZNEO_ID;
        }
        return false;
    }

    public static function updateIzneoFile() 
    { 
        return copy(self::IZNEO_PATH, '/home/sceneari/'.(APPLICATION_ENV == 'testing' ? '_v6_testing' : 'v6').'/docs/albums-izneo.xml');
    }

}
