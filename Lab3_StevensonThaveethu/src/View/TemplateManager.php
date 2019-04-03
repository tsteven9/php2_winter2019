<?php
/**
 *
 * Lab 3
 * 
 * Author: Stevenson Thaveethu
 * Date: March 25, 2019
 *
 * Description: Presenting the data to the user.
 * 
 *
 */
 
namespace Application\View;

class TemplateManager
{

    protected $html;
    
    protected $data = array();
    
    protected $userMessage;


    public function loadFormTemplate()
    {
    
        $this->html = require 'templates' 
                    . DIRECTORY_SEPARATOR 
                    . 'form.php';
                    
    }


    public function loadTemplate()
    {
    
        $this->html = require 'templates' 
                    . DIRECTORY_SEPARATOR 
                    . 'index.php';
                    
    }


    public function render()
    {
    
        echo $this->html;
        
    }


    public function getData()
    {
    
        return $this->data;
        
    }


    public function setData($data)
    {
    
        $this->data = $data;
        
        return $this;
        
    }


    public function getUserMessage()
    {
    
        return $this->userMessage;
        
    }


    public function setUserMessage($userMessage)
    {
    
        $this->userMessage = $userMessage;
        
        return $this;
        
    }

}
