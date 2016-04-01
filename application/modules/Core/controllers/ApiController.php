<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';
require_once LIB_PATH . '/Hashids/Hashids.php';

/**
 * Generic Api controller
 */
class ApiController extends GlobalController
{
    protected $config;

    public function init()
    {
        $this->config = Zend_Registry::get('api');

        $appId = $this->getRequest()->getParam('app_id');
        $token = $this->getRequest()->getParam('token');
        if (!empty($appId) && !empty($token)) {
            if (APPLICATION_ENV == 'testing' && $appId == 'test' && $token == 'test') {
                return true;
            }

            $m_api = new Core_Model_DbTable_Tblapi();
            $app   = $m_api->fetchRow('`app_id` = \''.$appId.'\'');

            if (!empty($app)) {
                $tokens = array();
                $now    = time();
                for ($i = $now - 5; $i < $now + 5; $i++) {
                    $tokens[] = md5($app->app_id . $app->app_secret . $i);
                }

                if (in_array($token, $tokens)) {
                    return true;
                }
            }
        }

        $this->getResponse()
            ->setHttpResponseCode(401)
            ->setBody(json_encode(array(
                'error' => 401,
                'body'  => 'You are not authorized here.'
            )))
            ->setHeader('Content-Type', 'application/json')
            ->sendResponse();
        die();
    }
}