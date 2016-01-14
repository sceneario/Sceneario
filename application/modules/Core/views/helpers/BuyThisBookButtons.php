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
        $fnac          = 'http://clic.reussissonsensemble.fr/click.asp?ref=745647&site=14485&type=text&tnb=3&diurl=http%3A%2F%2Feultech.fnac.com%2Fdynclick%2Ffnac%2F%3Feseg-name%3DaffilieID%26eseg-item%3D%24ref%24%26eaf-publisher%3DAFFILINET%26eaf-name%3Dg%3Fn%3Frique%26eaf-creative%3D%24affmt%24%26eaf-creativetype%3D%24affmn%24%26eurl%3Dhttp%253A%252F%252Frecherche.fnac.com%252Fr%252F'.$isbn.'%253FOrigin%253Daffilinet%2524ref%2524';
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

        try {
            libxml_use_internal_errors(true);  // erreurs xml non converties en warning php
            $xml = new SimpleXMLElement($xmlStr);
            libxml_clear_errors();  // purge des erreurs xml parce qu'on s'en occupe pas
            libxml_use_internal_errors(false);

            $res = $xml->xpath('album/ean[.=\''.$isbn.'\']/parent::*');
            if (isset($res[0]) && $res[0]->id) {
                return 'http://www.izneo.com/read-'.$isbn.'-'.$res[0]->id.'-'.self::IZNEO_ID;
            }
        } catch (Exception $e) {

        }
        return false;
    }

    public static function updateIzneoFile() {
        return copy(self::IZNEO_PATH, '/home/sceneari/'.(APPLICATION_ENV == 'testing' ? '_v6_testing' : 'v6').'/docs/albums-izneo.xml');
    }

}
