<?php
return array(
    'modules' => array(
        'ZfcBase',
        'ZfcUser',
        'ZfcTwig',
        'Mobile_Detect',
        'Blog',
        'Games',
        'Twigly',
        'ZendDeveloperTools',
        'BjyProfiler', 
        'EdpModuleLayouts',
        'ZF2NetteDebug',
        'Application',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
