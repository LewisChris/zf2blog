<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
           
            
          /*  
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ), */
        ),
    ),
    'di' => array(
        'instance' => array(
            'Zend\View\HelperLoader' => array(
                'parameters' => array(
                'map' => array(
                        'zfcUserIdentity' => 'ZfcUser\View\Helper\ZfcUserIdentity',
                        'zfcUserLoginWidget' => 'ZfcUser\View\Helper\ZfcUserLoginWidget',
                    ),
                ),
            ),
        ),
    ),




    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'nb_NO',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'module_layouts' => array(
        'Application' => 'layout/layout.twig',
        'Blog' => 'layout/layout.twig',
    ),

    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404.phtml',
        'exception_template'       => 'error/index.phtml',
        'template_map' => array(
            'application/index/index'       => __DIR__ . '/../view/application/index/index.twig', 
            //'application/index/about'       => __DIR__ . '/../views/application/index/index.twig', 
            'error/404'               => __DIR__ . '/../view/error/404.twig',
            'error/index'             => __DIR__ . '/../view/error/index.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
