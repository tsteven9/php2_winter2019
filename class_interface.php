<?php

interface ServiceManagerAwareInterface
{
    public function getConfig();

    public function getService();
}

interface EventManagerAwareInterface
{
    public function getEvents();

}

// A class can "implement" many interfaces, but can extend only ONE base class.
class Service implements ServiceManagerAwareInterface, EventManagerAwareInterface
{

    protected $serviceObject;

    protected $registeredEvents;

    public function getConfig()
    {
        return 'email: true';
    }

    public function getService()
    {
        return $this->serviceObject;
    }

    public function getEvents()
    {
        return $this->registeredEvents;
    }

}