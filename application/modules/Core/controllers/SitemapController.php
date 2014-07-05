<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php' ;

set_time_limit(0);

class SitemapController extends GlobalController
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $url = 'http://www.sceneario.com';
        $csu = new Core_Service_Utilities();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'."\n"; 

        $categories = array(
            array(
                'link' => $url,
                'freq' => 'daily',
                'priority' => '1.0'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblalbum',
                'fetch' => 'getAllAlbumsForIndex',
                'link' => 'getAlbumUrlFromId',
                'params' => array('idAlbum'),
                'freq' => 'monthly',
                'priority' => '0.9'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblserie',
                'fetch' => 'getAllSeriesForIndex',
                'link' => 'getSerieUrlFromId',
                'params' => array('idSerie', 'nomSerie'),
                'freq' => 'monthly',
                'priority' => '0.7'
            ),
            array(
                'link' => $url.'/interview',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblinterviews',
                'fetch' => 'getAllInterviewsForIndex',
                'link' => 'getInterviewUrlFromId',
                'params' => array('idInterview'),
                'freq' => 'monthly',
                'priority' => '0.9'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblauteurs',
                'fetch' => 'getAllAuteursForIndex',
                'link' => 'getAuteurUrlFromId',
                'params' => array('idAuteur'),
                'freq' => 'monthly',
                'priority' => '0.6'
            ),
            array(
                'link' => $url.'/expositions-salons',
                'freq' => 'monthly',
                'priority' => '0.7'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblexpos',
                'fetch' => 'getAllExposForIndex',
                'link' => 'getExpoUrlFromId',
                'params' => array('annee', 'idExpo'),
                'freq' => 'monthly',
                'priority' => '0.7'
            ),
            array(
                'link' => $url.'/galerie',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tbldossiers',
                'fetch' => 'getAllDossiersForIndex',
                'link' => 'getDossierUrlFromId',
                'params' => array('idDossier'),
                'freq' => 'monthly',
                'priority' => '0.7'
            ),
            array(
                'link' => $url.'/bande-dessinee.html',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'link' => $url.'/bande-dessinee/nouveautes.html',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'link' => $url.'/bande-dessinee/prochaines-parutions.html',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'link' => $url.'/bande-dessinee/coupsdecoeur.html',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'link' => $url.'/bande-dessinee/recommandes.html',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'link' => $url.'/preview',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'link' => $url.'/concours',
                'freq' => 'weekly',
                'priority' => '0.8'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblconcoursent',
                'fetch' => 'getAllConcoursForIndex',
                'link' => 'getConcoursUrlFromId',
                'params' => array('nomConcours', 'libelleConcours'),
                'freq' => 'monthly',
                'priority' => '0.7'
            ),
            array(
                'link' => $url.'/newsletter',
                'freq' => 'yearly',
                'priority' => '0.6'
            ),
            array(
                'link' => $url.'/mentions-legales',
                'freq' => 'yearly',
                'priority' => '0.4'
            ),
            array(
                'link' => $url.'/equipe',
                'freq' => 'yearly',
                'priority' => '0.4'
            ),
        );

        foreach ($categories as $category) {
            if (!empty($category['mapper']) && !empty($category['fetch']) && !empty($category['params'])) {
                $m = new $category['mapper']();
                $rows = $m->$category['fetch']();
                if (!empty($rows)) {
                    foreach ($rows as $row) {
                        $params = array();
                        foreach ($category['params'] as $p) $params[] = $row->$p;
                        $xml .= '  <url>'."\n";
                        $xml .= '    <loc>'.$url.call_user_func_array(array($csu, $category['link']), $params).'</loc>'."\n";

                        // special for albums to fetch cover and board pictures
                        if ($category['mapper'] == 'Core_Model_Mapper_Tblalbum') {
                            $xml .= '    <image:image>'."\n";
                            $xml .= '      <image:loc>'.$url.$this->view->customUrl(array('isbn'=> $row->isbn, 'format'=> 'big'), 'couverture').'</image:loc>'."\n";
                            $xml .= '      <image:title>Couverture - '.urlencode($row->titre).'</image:title>'."\n";
                            $xml .= '      <image:caption>'.urlencode($row->collection.' - '.$row->titre).'</image:caption>'."\n";
                            $xml .= '    </image:image>'."\n";
                            $xml .= '    <image:image>'."\n";
                            $xml .= '      <image:loc>'.$url.$this->view->customUrl(array('isbn'=> $row->isbn, 'idAlbum' => $row->idAlbum, 'format'=> 'big'), 'planche').'</image:loc>'."\n";
                            $xml .= '      <image:title>Planche - '.urlencode($row->titre).'</image:title>'."\n";
                            $xml .= '      <image:caption>'.urlencode($row->collection.' - '.$row->titre).'</image:caption>'."\n";
                            $xml .= '    </image:image>'."\n";
                            $xml .= '    <image:image>'."\n";
                            $xml .= '      <image:loc>'.$url.$this->view->customUrl(array('isbn'=> $row->isbn, 'format'=> 'large'), 'couverture').'</image:loc>'."\n";
                            $xml .= '      <image:title>Couverture - '.urlencode($row->titre).'</image:title>'."\n";
                            $xml .= '      <image:caption>'.urlencode($row->collection.' - '.$row->titre).'</image:caption>'."\n";
                            $xml .= '    </image:image>'."\n";
                            $xml .= '    <image:image>'."\n";
                            $xml .= '      <image:loc>'.$url.$this->view->customUrl(array('isbn'=> $row->isbn, 'idAlbum' => $row->idAlbum, 'format'=> 'large'), 'planche').'</image:loc>'."\n";
                            $xml .= '      <image:title>Planche - '.urlencode($row->titre).'</image:title>'."\n";
                            $xml .= '      <image:caption>'.urlencode($row->collection.' - '.$row->titre).'</image:caption>'."\n";
                            $xml .= '    </image:image>'."\n";
                        }

                        $xml .= '    <changefreq>'.$category['freq'].'</changefreq>'."\n";
                        $xml .= '    <priority>'.$category['priority'].'</priority>'."\n";
                        $xml .= '  </url>'."\n";
                    }
                }            
            } else if (!empty($category['link'])) {
                $xml .= '  <url>'."\n";
                $xml .= '    <loc>'.$category['link'].'</loc>'."\n";
                $xml .= '    <changefreq>'.$category['freq'].'</changefreq>'."\n";
                $xml .= '    <priority>'.$category['priority'].'</priority>'."\n";
                $xml .= '  </url>'."\n";
            }
        }

        $xml .= '</urlset>'."\n";
        
        file_put_contents('sitemap.xml', $xml);

        die();
    }
}

