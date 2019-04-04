<?php

namespace Application\Services;

trait SessionServiceTrait {

    protected $sessionService;

    /**
     * @return mixed
     */
    public function getSessionService()
    {
        return $this->sessionService;
    }

    /**
     * @param mixed $sessionService
     */
    public function setSessionService($sessionService): void
    {
        $this->sessionService = $sessionService;
    }
}