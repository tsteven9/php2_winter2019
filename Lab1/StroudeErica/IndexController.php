<?php
/**
 * Created by PhpStorm.
 * User: E_STROUD
 * Date: 2019-02-06
 * Time: 7:47 PM
 */

require 'DataStorage.php';
require 'TemplateManager.php';

class IndexController
{

    protected $data = [];
    protected $viewManager;


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