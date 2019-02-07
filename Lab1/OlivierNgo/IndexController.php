<?php

require 'TemplateManager.php';
require 'DataStorage.php';
class indexController
{
        protected $data = [];
        protected  $viewManager;


    public function indexAction()
    {
        $dataStorage = new DataStorage();
        $this->data['firstName'] = $dataStorage->getFirstName();
        $this->data['lastName'] = $dataStorage->getLastName();
        $this->data['age'] = $dataStorage->getAge();


        $this->viewManager = new TemplateManager();
        $this->viewManager->setData($this->data);
        $this->viewManager->loadTemplate();
        $this->viewManager->render();


    }


}