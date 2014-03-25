<?php
/*
 * INIT DE L'APP
 */
define('DS', DIRECTORY_SEPARATOR);

 

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define path to application directory
defined('ROOT_PATH')
    || define('ROOT_PATH', realpath(dirname(dirname(__FILE__)) ) . DS);


// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
 
// Chemin du module CORE
define ('CORE_PATH', APPLICATION_PATH . DS . 'modules' . DS .'Core' . DS) ;

// Define core config path
defined('CONFIG_PATH')
    || define('CONFIG_PATH', CORE_PATH . 'configs' . DS);
    
// Define public dir
defined('PUBLIC_DIR')
    || define('PUBLIC_DIR', APPLICATION_ENV == 'development' ? 'public' : 'public');
    
defined('BASE_URL')
    || define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST']. '/' );
    
// Define uploads dir
defined('UPLOADS_DIR_URL')
    || define('UPLOADS_DIR_URL', BASE_URL ); //. 'uploads' . DS

define ('IS_PUBLISHED'    , 'O');
define ('IS_NOT_PUBLISHED', 'N');

define ('LIB_PATH', APPLICATION_PATH . '/../library' ) ;

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'), 
    get_include_path(),
)));


/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap()
            ->run();
