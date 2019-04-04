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

class LogoutController extends Controller implements AscmvcControllerFactoryInterface
{
    use SessionServiceTrait;

    public static function factory(array &$baseConfig, &$viewObject, Container &$serviceManager, AscmvcEventManager &$eventManager)
    {
        $serviceManager[LogoutController::class] = $serviceManager->factory(function ($serviceManager) use ($baseConfig) {
            $sessionService = $serviceManager[SessionService::class];

            $controller = new LogoutController($baseConfig);

            $controller->setSessionService($sessionService);

            return $controller;
        });
    }

    public function indexAction($vars = null)
    {
        $this->sessionService->logout();

        $response = new Response();
        $response = $response
            ->withStatus(302)
            ->withHeader('Location', '/login');

        return $response;
    }
}