<?php

require 'TemplateManager.php';
require 'Person.php';

class IndexController
{
    protected $data = [];
    protected $viewManager;

    public function indexAction()
    {
        $person = new Person();

        $this->data['firstName'] = $person->getFirstName();
        $this->data['lastName'] = $person->getLastName();
        $this->data['age'] = $person->getAge();

        $this->viewManager = new TemplateManager();
        $this->viewManager->setData($this->data);
        $this->viewManager->loadTemplate();

        $this->viewManager->render();
    }

}