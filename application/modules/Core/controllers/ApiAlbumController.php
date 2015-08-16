<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/ApiController.php';

/**
 * Api Album controller
 */
class ApiAlbumController extends ApiController
{
    const ALBUM_PER_PAGE = 20;

    private $_mapperAlbum;

    public function init()
    {
        parent::init();

        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_mapperAlbum = new Core_Model_Mapper_Tblalbum();
    }

    /**
     * get specific album from api offuscated id
     */
    public function getAction()
    {
        $id = $this->getRequest()->getParam('id');

        if (!empty($id)) {
            $hashids = new Hashids($this->config['key']);
            $matches = $hashids->decode($id);
            if (isset($matches[0]) && !empty($matches[0])) {
                $album = $this->_mapperAlbum->find((int)$matches[0], new Core_Model_Tblalbum);

                if (!empty($album)) {
                    $this->_helper->json($this->_getFullAlbumInfos($album));
                }
            }
        }

        $this->_helper->json(array(
            'error' => 404,
            'data'  => 'album not found'
        ));
    }

    /**
     * list every albums
     */
    public function listAction()
    {
        $page   = (int) $this->getRequest()->getParam('page');
        $limit  = self::ALBUM_PER_PAGE;
        $offset = ($page - 1) * $limit;
        $return = array('data' => array());

        $albums = $this->_mapperAlbum->fetchAll($limit + 1, array('clause' => 'enligne = ?', 'params' => IS_PUBLISHED), 'idAlbum DESC', $offset);

        if ($page > 1) {
            $return['prev'] = $this->view->url(array('page' => $page - 1), "api_album_list", true);
        }
        if (count($albums) > $limit) {
            $return['next'] = $this->view->url(array('page' => $page + 1), "api_album_list", true);
        }
        array_pop($albums);

        foreach ($albums as $album) {
            $return['data'][] = $this->_getAlbumInfos($album[0]);
        }

        $this->_helper->json($return);
    }

    private function _getAlbumInfos(Core_Model_Tblalbum $album)
    {
        $hashids   = new Hashids($this->config['key']);
        $encodedId = $hashids->encode($album->getIdAlbum());

        $editor = null;
        if ($album->getFKidEditeur() != '') {
            $editeurMapper = new Core_Model_Mapper_Tblediteur();
            $editeurInfos  = $editeurMapper->find($album->getFKidEditeur(), new Core_Model_Tblediteur);

            if (!empty($editeurInfos)) {
                $editor = $editeurInfos->getPrenomEditeur() != '' ? $editeurInfos->getPrenomEditeur() . ' ' . $editeurInfos->getNomEditeur() : $editeurInfos->getNomEditeur() ;
            }
        }

        $authors           = array('cartoonist', 'colorist', 'scriptwriter');
        $albumDessinateurs = $this->_mapperAlbum->getAlbumDessinateurs($album->getIdAlbum());
        $albumColoristes   = $this->_mapperAlbum->getAlbumColoristes($album->getIdAlbum());
        $albumScenaristes  = $this->_mapperAlbum->getAlbumScenaristes($album->getIdAlbum());

        foreach ($albumDessinateurs as $dessinateur) {
            $authors['cartoonist'][] = (!empty($dessinateur->prenomAuteur) ? $dessinateur->prenomAuteur . ' ' : '') . $dessinateur->nomAuteur;
        }
        foreach ($albumColoristes as $coloriste) {
            $authors['colorist'][] = (!empty($coloriste->prenomAuteur) ? $coloriste->prenomAuteur . ' ' : '') . $coloriste->nomAuteur;
        }
        foreach ($albumScenaristes as $sceneariste) {
            $authors['scriptwriter'][] = (!empty($sceneariste->prenomAuteur) ? $sceneariste->prenomAuteur . ' ' : '') . $sceneariste->nomAuteur;
        }

        $keywords      = array();
        $albumKeywords = $this->_mapperAlbum->getAlbumKeywords($album->getIdAlbum());
        foreach ($albumKeywords as $kw) {
            $keywords[] = $kw->libelle;
        }

        return array(
            'id'         => $encodedId,
            'title'      => $album->getTitre(),
            'collection' => !empty($album->getCollection()) ? $album->getCollection() : null,
            'subtitle'   => !empty($album->getSousTitre()) ? $album->getSousTitre() : null,
            'volume'     => !empty($album->getTome()) ? $album->getTome() : null,
            'authors'    => $authors,
            'editor'     => $editor,
            'isbn'       => $album->getIsbn(),
            'pictures'   => array(
                'cover'  => $this->view->serverUrl() . $this->view->baseUrl() . $this->view->getHelper('customUrl')->getAlbumCoverUrl($album, 'small'),
                'sample' => $this->view->serverUrl() . $this->view->baseUrl() . $this->view->getHelper('customUrl')->getAlbumPageUrl($album, 'small'),
            ),
            'url'        => $this->view->serverUrl() . $this->view->baseUrl() . $this->view->url(array('id' => $encodedId), "api_album_get", true),
            'genres'     => $keywords,
            'date'       => date('Y-m', strtotime($album->getDate()))
        );
    }

    private function _getFullAlbumInfos(Core_Model_Tblalbum $album)
    {
        $ret          = $this->_getAlbumInfos($album);
        $albumExcerpt = $this->_mapperAlbum->getAlbumExcerpt($album->getIdAlbum());
        $albumCritic  = $this->_mapperAlbum->getAlbumCritic($album->getIdAlbum());

        foreach ($albumExcerpt as $excerpt) {
            $ret['summary'][] = array(
                'posted_by' => $excerpt->pseudo,
                'posted_on' => $excerpt->dateHistoire,
                'content'   => $excerpt->histoire
            );
        }

        foreach ($albumCritic as $critic) {
            if ($critic->active == '1') {
                $ret['review'][] = array(
                    'posted_by' => $critic->pseudo,
                    'posted_on' => $critic->datecreation,
                    'content'   => $critic->critique
                );
            }
        }

        $ret['pictures'] = array(
            'cover'  => $this->view->serverUrl() . $this->view->baseUrl() . $this->view->getHelper('customUrl')->getAlbumCoverUrl($album),
            'sample' => $this->view->serverUrl() . $this->view->baseUrl() . $this->view->getHelper('customUrl')->getAlbumPageUrl($album),
        );

        return $ret;
    }
}
