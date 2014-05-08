<?php
/*
 * Affiche un bloc contenant le dernier post du blog
 * @extend Zend_View_Helper_CustomUrl
 */
class Zend_View_Helper_LastBlogPostBloc extends Zend_View_Helper_CustomUrl
{
    /*
     * @var Zend_View $view
     */
    public function lastBlogPostBloc($view, $itemNumber = 0)
    {
        if ($view instanceof Zend_View && $c = @file_get_contents('http://www.sceneario.com/blog/feed/')) {
            $c   = str_replace('content:encoded>', 'content>', $c);
            $rss = simplexml_load_string($c);

            if (!empty($rss) && !empty($rss->channel) && !empty($rss->channel->item) && !empty($rss->channel->item[0])) {

                $lastItem = $rss->channel->item[$itemNumber];
                preg_match('/src=[\'"]?([^\'" >]+)[\'" >]/', $lastItem->content, $lastItemImg);

                if (!empty($lastItem)) {
                    $datas = array(
                        'rubrique'   => 'Actualités',
                        'titre'      => $lastItem->title,
                        'sous_titre' => '',
                        'text'       => '',
                        'image'      => $lastItemImg[1],
                        'id'         => '',
                        'lien'       => array('type' => 'Lire la suite', 'url'  => $lastItem->link, 'tout_afficher' => 'http://www.sceneario.com/blog'),
                        'couleur'    => 'white',
                    );
                    return $view->partial('partials/block300.phtml', array('data' => $datas));
                }
            }
        }
        return null ;
    }
}