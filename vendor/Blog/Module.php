<?php

namespace Blog;

use Blog\Model\BlogTable;

class Module
{
    
     public function onBootstrap($e)
    {
        $sharedEvents = $e->getApplication()->getServiceManager()->get('moduleManager')->getEventManager()->getSharedManager();
        $sharedEvents->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller    = $e->getTarget();
            $matchedRoute  = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
            $matchedAction = $controller->getEvent()->getRouteMatch()->getParams();
            
            $allowedRoutes = array('zfcuser/login', 'zfcuser/register');
            $role=$controller->zfcUserAuthentication()->getIdentity();
            // print("<pre>"); var_dump($role);print("</pre>");
            $state=$controller->zfcUserAuthentication()->hasIdentity();
            return $state;
            //if (in_array($matchedRoute, $allowedRoutes) || $controller->zfcUserAuthentication()->hasIdentity()) {
            //    return; // they're logged in or on the login page, allow
                        
            // otherwise, redirect to the login page
            //return $controller->redirect()->toRoute('zfcuser/login');
            //var_dump($matchedRoute);
              
             
        });
    }
    

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Blog\Model\BlogTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new BlogTable($dbAdapter);
                    #$table->setLogger($sm->get('logger'));
                    return $table;
                }
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}


