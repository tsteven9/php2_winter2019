<?php

namespace Application\Controllers;

use Application\Models\Entity\Users;
use Application\Services\SessionService;
use Application\Services\SessionServiceTrait;
use Ascmvc\AscmvcControllerFactoryInterface;
use Ascmvc\Mvc\AscmvcEventManager;
use Ascmvc\Mvc\Controller;
use Ascmvc\Mvc\AscmvcEvent;
use Pimple\Container;
use Zend\Diactoros\Response;

class LoginController extends Controller implements AscmvcControllerFactoryInterface
{
    use SessionServiceTrait;
    
    public static function onBootstrap(AscmvcEvent $event)
    {
        $app = $event->getApplication();
        
        $baseConfig = $app->getBaseConfig();
        
        $serviceManager = $app->getServiceManager();
        
        $em = $serviceManager['dem1'];
        
        $users = new Users();
        
        $serviceManager[SessionService::class] = function ($serviceManager) use ($users, $em) {
            static $sessionManager;
            
            if (!isset($sessionManager)) {
                $sessionManager = new SessionService($users, $em);
            }
            
            return $sessionManager;
        };
        
        $sessionService = $serviceManager[SessionService::class];
        
        $view = $baseConfig['view'];
        
        $view['authenticated'] = $sessionService->isAuthenticated();
        
        $app->appendBaseConfig('view', $view);
    }
    
    public static function factory(array &$baseConfig, &$viewObject, Container &$serviceManager, AscmvcEventManager &$eventManager)
    {
        $serviceManager[LoginController::class] = $serviceManager->factory(function ($serviceManager) use ($baseConfig) {
            $sessionService = $serviceManager[SessionService::class];
            
            $controller = new LoginController($baseConfig);
            
            $controller->setSessionService($sessionService);
            
            return $controller;
        });
    }
    
    public function onDispatch(AscmvcEvent $event)
    {
        $this->view['saved'] = 0;
        
        $this->view['error'] = 0;
    }
    
    public function indexAction($vars = null)
    {
        $this->view['error_message'] = '';
        
        $this->view['bodyjs'] = 1;
        
        if ($this->sessionService->isAuthenticated()) {
            $response = new Response();
            $response = $response
                ->withStatus(302)
                ->withHeader('Location', '/index');
                
            return $response;
        }
        
        if (!empty($vars['post'])) {
            if(
                isset($vars['post']['username'])
                && isset($vars['post']['password'])
                && isset($vars['post']['submit'])
            ) {
                $username = (string) $vars['post']['username'];
                
                $password = (string) $vars['post']['password'];
                
                if (!ctype_alnum($username)) {
                    $username = preg_replace("/[^a-zA-Z]+/", "", $username);
                }
                
                if (strlen($username) > 40) {
                    $username = substr($username, 0, 39);
                }
                
                $password = preg_replace("/[^_a-zA-Z0-9]+/", "", $password);
                
                if (strlen($password) > 40) {
                    $password = substr($password, 0, 39);
                }
                
                // check login $this->sessionService->checkLogin($username, $password)
                if($this->sessionService->checkLogin($username, $password)) {
                    $response = new Response();
                    $response = $response
                        ->withStatus(302)
                        ->withHeader('Location', '/index');
                        
                    return $response;
                }
                
                $this->view['error_message'] = 'Wrong credentials!';
            }
        }
        
        // post the form
        $this->view['templatefile'] = 'login_index';
        
        return $this->view;
    }
}