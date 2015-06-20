<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Zend_View_Helper_BuyThisBookButtons
{
    const IZNEO_PATH = 'http://www.izneo.com/xml/albums.xml';
    const IZNEO_ID   = '970';

    public function buyThisBookButtons($view, $isbn, $lienAmazon = "") {

        $bdBuzzAvailability = new Core_Service_BdBuzzAvailability();
        try {
            $lienBdBuzz = $bdBuzzAvailability->checkBdBuzzISBNAvailability($isbn);
        } catch (Exception $e) {
            // something went wrong with isbn
            // @todo : send email to alert someone ?
        }

        $priceMinister = 'http://track.effiliation.com/servlet/effi.redir?id_compteur=12078843&url=http://www.priceminister.com/s/'.$isbn.'';
        $bdFugue       = 'http://www.bdfugue.com/a/?ean='.$isbn.'&ref=14';
        $fnac          = 'http://ad.zanox.com/ppc/?12175452C2022213026T&ULP=[['.urlencode('www3.fnac.com/search/quick.do?category=book&text='.$isbn).']]';
        $izneo         = self::getIzneoLink($isbn);
        $cultura       = 'http://clk.tradedoubler.com/click?p=218642&a=2411443&g=21903292&url=http://www.cultura.com/catalog/product/search/ean/'.$isbn;

        $bookButtons = array(
            'Priceminister' => $priceMinister,
            'BdFugue'       => $bdFugue,
            'FNAC'          => $fnac,
            'Cultura'       => $cultura,
        );

        if ($lienAmazon != "") {
            $amazon      = 'http://www.amazon.fr/exec/obidos/ASIN/' . $lienAmazon . '/sceneariocom-21';
            $bookButtons = $bookButtons + array('Amazon' => $amazon);
        }

        if (!empty($lienBdBuzz)) {
            $bookButtons['bdBuzz'] = $lienBdBuzz;
        }

        if ($izneo !== false) {
            $bookButtons['izneo'] = $izneo;
        }

        return $view->partial('partials/buy_menu.phtml', array('links' => $bookButtons));
    }

    public static function getIzneoLink($isbn) {
        $path = '/home/sceneari/'.(APPLICATION_ENV == 'testing' ? '_v6_testing' : 'v6').'/docs/albums-izneo.xml';
        if (!file_exists($path)) {
            echo self::updateIzneoFile();
        }

        $xmlStr = @file_get_contents($path);
		if (empty($xmlStr)) {
	        return false;
        }

        $xml = new SimpleXMLElement($xmlStr);
        $res = $xml->xpath('album/ean[.=\''.$isbn.'\']/parent::*');
        if (isset($res[0]) && $res[0]->id) {
            return 'http://www.izneo.com/read-'.$isbn.'-'.$res[0]->id.'-'.self::IZNEO_ID;
        }
        return false;
    }

    public static function updateIzneoFile() {
        return copy(self::IZNEO_PATH, '/home/sceneari/'.(APPLICATION_ENV == 'testing' ? '_v6_testing' : 'v6').'/docs/albums-izneo.xml');
    }

}
