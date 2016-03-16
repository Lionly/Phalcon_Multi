<?php

/**
 * Register application modules
 */
$application->registerModules(array(
    'admin' => array(
        'className' => 'Module',
        'path' => __DIR__ . '/../apps/admin/Module.php'
    ),
    'wap' => array(
        'className' => 'Module',
        'path' => __DIR__ . '/../apps/wap/Module.php'
    )
));
