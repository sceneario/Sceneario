<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php' ;

set_time_limit(0);
ini_set("memory_limit","512M");

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

        $categories = array(
            array(
                'link' => $url,
                'freq' => 'daily',
                'priority' => '1.0',
                'sitemap' => 'global'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblalbum',
                'fetch' => 'getAllAlbumsForIndex',
                'link' => 'getAlbumUrlFromId',
                'params' => array('idAlbum'),
                'freq' => 'monthly',
                'priority' => '0.9',
                'sitemap' => 'albums'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblserie',
                'fetch' => 'getAllSeriesForIndex',
                'link' => 'getSerieUrlFromId',
                'params' => array('idSerie', 'nomSerie'),
                'freq' => 'monthly',
                'priority' => '0.7',
                'sitemap' => 'series'
            ),
            array(
                'link' => $url.'/interview',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'interviews'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblinterviews',
                'fetch' => 'getAllInterviewsForIndex',
                'link' => 'getInterviewUrlFromId',
                'params' => array('idInterview'),
                'freq' => 'monthly',
                'priority' => '0.9',
                'sitemap' => 'interviews'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblauteurs',
                'fetch' => 'getAllAuteursForIndex',
                'link' => 'getAuteurUrlFromId',
                'params' => array('idAuteur'),
                'freq' => 'monthly',
                'priority' => '0.6',
                'sitemap' => 'auteurs'
            ),
            array(
                'link' => $url.'/expositions-salons',
                'freq' => 'monthly',
                'priority' => '0.7',
                'sitemap' => 'expositions'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblexpos',
                'fetch' => 'getAllExposForIndex',
                'link' => 'getExpoUrlFromId',
                'params' => array('annee', 'idExpo'),
                'freq' => 'monthly',
                'priority' => '0.7',
                'sitemap' => 'expositions'
            ),
            array(
                'link' => $url.'/galerie',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'expositions'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tbldossiers',
                'fetch' => 'getAllDossiersForIndex',
                'link' => 'getDossierUrlFromId',
                'params' => array('idDossier'),
                'freq' => 'monthly',
                'priority' => '0.7',
                'sitemap' => 'expositions'
            ),
            array(
                'link' => $url.'/bande-dessinee',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/bande-dessinee/albums',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/bande-dessinee/series',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/bande-dessinee/auteurs',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/bande-dessinee/nouveautes',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/bande-dessinee/prochaines-parutions',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/bande-dessinee/coupsdecoeur',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/bande-dessinee/recommandes',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/preview',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/concours',
                'freq' => 'weekly',
                'priority' => '0.8',
                'sitemap' => 'concours'
            ),
            array(
                'mapper' => 'Core_Model_Mapper_Tblconcoursent',
                'fetch' => 'getAllConcoursForIndex',
                'link' => 'getConcoursUrlFromId',
                'params' => array('nomConcours', 'libelleConcours'),
                'freq' => 'monthly',
                'priority' => '0.7',
                'sitemap' => 'concours'
            ),
            array(
                'link' => $url.'/newsletter',
                'freq' => 'yearly',
                'priority' => '0.6',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/mentions-legales',
                'freq' => 'yearly',
                'priority' => '0.4',
                'sitemap' => 'global'
            ),
            array(
                'link' => $url.'/equipe',
                'freq' => 'yearly',
                'priority' => '0.4',
                'sitemap' => 'global'
            ),
        );

        $sitemaps = array();
        foreach ($categories as $category) {
            $item = '';
            $sitemap = $category['sitemap'];
            if (!empty($category['mapper']) && !empty($category['fetch']) && !empty($category['params'])) {
                $m = new $category['mapper']();
                $rows = $m->$category['fetch']();
                if (!empty($rows)) {
                    foreach ($rows as $k => $row) {
                        if ($k > 0 && $k % 7000 == 0) {
                            $sitemaps[$sitemap][] = $item;
                            $item = '';
                            $sitemap = $category['sitemap'].'-'.floor($k / 7000);
                        }
                        $params = array();
                        foreach ($category['params'] as $p) $params[] = $row->$p;
                        $item .= '  <url>'."\n";
                        $item .= '    <loc>'.$url.call_user_func_array(array($csu, $category['link']), $params).'</loc>'."\n";

                        // special for albums to fetch cover and board pictures
                        if ($category['mapper'] == 'Core_Model_Mapper_Tblalbum') {
                            $title = 'BD '.$row->collection.($row->titre != $row->collection ? ' - '.$row->titre : '');
                            $item .= '    <image:image>'."\n";
                            $item .= '      <image:loc>'.$url.$this->view->getHelper('customUrl')->getAlbumCoverUrl($row, 'big').'</image:loc>'."\n";
                            $item .= '      <image:title><![CDATA[Couverture '.$title.']]></image:title>'."\n";
                            $item .= '    </image:image>'."\n";
                            $item .= '    <image:image>'."\n";
                            $item .= '      <image:loc>'.$url.$this->view->getHelper('customUrl')->getAlbumPageUrl($row, 'big').'</image:loc>'."\n";
                            $item .= '      <image:title><![CDATA[Extrait '.$title.']]></image:title>'."\n";
                            $item .= '    </image:image>'."\n";
                            $item .= '    <image:image>'."\n";
                            $item .= '      <image:loc>'.$url.$this->view->getHelper('customUrl')->getAlbumCoverUrl($row).'</image:loc>'."\n";
                            $item .= '      <image:title><![CDATA[Couverture '.$title.']]></image:title>'."\n";
                            $item .= '    </image:image>'."\n";
                            $item .= '    <image:image>'."\n";
                            $item .= '      <image:loc>'.$url.$this->view->getHelper('customUrl')->getAlbumPageUrl($row).'</image:loc>'."\n";
                            $item .= '      <image:title><![CDATA[Extrait '.$title.']]></image:title>'."\n";
                            $item .= '    </image:image>'."\n";
                        }

                        $item .= '    <changefreq>'.$category['freq'].'</changefreq>'."\n";
                        $item .= '    <priority>'.$category['priority'].'</priority>'."\n";
                        $item .= '  </url>'."\n";
                    }
                }
            } else if (!empty($category['link'])) {
                $item .= '  <url>'."\n";
                $item .= '    <loc>'.$category['link'].'</loc>'."\n";
                $item .= '    <changefreq>'.$category['freq'].'</changefreq>'."\n";
                $item .= '    <priority>'.$category['priority'].'</priority>'."\n";
                $item .= '  </url>'."\n";
            }

            $sitemaps[$sitemap][] = $item;
        }



        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $start_sitemap = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $start_sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'."\n";
        $end_sitemap   = '</urlset>'."\n";

        foreach (array_keys($sitemaps) as $sitemap) {
            $xml .= '  <sitemap>'."\n";
            $xml .= '    <loc>'.$url.'/sitemap-'.$sitemap.'.xml</loc>'."\n";
            $xml .= '    <lastmod>'.date('Y-m-d').'</lastmod>'."\n";
            $xml .= '  </sitemap>'."\n";

            $s = $start_sitemap;
            foreach ($sitemaps[$sitemap] as $item) {
                $s .= $item;
            }
            $s .= $end_sitemap;
            file_put_contents('sitemap-'.$sitemap.'.xml', $s);
        }

        $xml .= '</sitemapindex>';

        file_put_contents('sitemap.xml', $xml);

        die();
    }
}

