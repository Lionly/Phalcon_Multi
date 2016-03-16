<?php

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

try {

    /**
     * 读取配置文件，本地开发环境可使用 config/config.ini.dev 配置文件
     */
    $config = new ConfigIni(APP_PATH . '/config/config.ini');
    if (is_readable(APP_PATH . '/config/config.dev.ini')) {
        $override = new ConfigIni(APP_PATH . '/config/config.dev.ini');
        $config->merge($override);
    }
    /** 
     * 注册公共目录，可用命名空间，也可不用（默认为 \ ）
     */
    $loader = new \Phalcon\Loader();
    
    $loader->registerDirs(array(
        APP_PATH . '/models',
        APP_PATH . '/library',
        APP_PATH . '/plugins'
    ))->register();
    /**
     * Include services
     */
    require __DIR__ . '/../config/services.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Include modules
     */
    require __DIR__ . '/../config/modules.php';

    /**
     * Include routes
     */
    require __DIR__ . '/../config/routes.php';

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
