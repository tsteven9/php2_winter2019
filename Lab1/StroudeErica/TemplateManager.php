<?php
/**
 * Created by PhpStorm.
 * User: E_STROUD
 * Date: 2019-02-06
 * Time: 6:44 PM
 */

class TemplateManager
{
    protected $html;
    protected $data = [];


    public function loadTemplate()
    {

        $this->html = '<!DOCTYPE html>';
        $this->html .= '<lang="en">';
        $this->html .='<head>';
        $this->html .='<meta charset="UTF-8">';
        $this->html .='<meta name="viewport" content="width=device-width, initial-scale=1">';

    // BootStrap CSS bootstrap-4.2.1-dist
        $this->html .='<link rel="stylesheet" href="http://localhost:63342/php2_winter2019/Lab1/StroudeErica/css/bootstrap.min.css">';

    // jQuery
        $this->html .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';

    // BootStrap JS bootstrap-4.2.1-dist
        $this->html .= '<script src="http://localhost:63342/php2_winter2019/Lab1/StroudeErica/js/bootstrap.bundle.min.js"></script>';

    // JavaScript
        $this->html .= '<script type="text/javascript" src="http://localhost:63342/php2_winter2019/Lab1/StroudeErica/js/myjs.js"></script>';
    // Custom CSS
        $this->html .= '<link rel="stylesheet" href="http://localhost:63342/php2_winter2019/Lab1/StroudeErica/css/custom.css">';
        $this->html .='</head>';
        $this->html .= '<title>First Page</title>';
        $this->html .= '</head>';
        $this->html .= '<body>';
    // Main div
        $this->html .= '<div id="image">';
        $this->html .= '<h1>Hello World</h1>';
        $this->html .='<p>Welcome to our <b>first</b> page for PHP Programming with MySQL II.</p>';
            //. $this->data['firstName']
            //. ''
           //. $this->data['lastName']
            //. '<br></p>';

           $this->html .= 'Your name is ' . $this->data['firstName'] . ' ' . $this->data['lastName'] . '. ' . 'You are ' . $this->data['age'] . ' years old!</p><br>';
    // Sun div
        $this->html .= '<div id="sun">';

        $this->html .='</div>';

        $this->html .='</div>';
        $this->html .= '<button id="button" type="submit">Change it!</button>';

    // Sign in form
        $this->html .='<form id="signin" class="form-inline">';
        $this->html .= '<p id="form">If the information above is correct, please sign in</p>';
        $this->html .= '<label class="sr-only" for="inlineFormInputName2">Name</label>';
        $this->html .= '<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Smith">';

        $this->html .= '<label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>';
        $this->html .= '<div class="input-group mb-2 mr-sm-2">';
        $this->html .= '<div class="input-group-prepend">';
        $this->html .= '<div class="\input-group-text">@</div>';
        $this->html .= '</div>';
        $this->html .= '<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">';
        $this->html .='</div>';

        $this->html .= '<div class="form-check mb-2 mr-sm-2">';
        $this->html .= '<input class="form-check-input" type="checkbox" id="inlineFormCheck">';
        $this->html .='<label class="form-check-label" for="inlineFormCheck">';
        $this->html .= 'Remember me';
        $this->html .= '</label>';
        $this->html .='</div>';

        $this->html .='<button type="submit" class="btn btn-primary mb-2">Submit</button>';
        $this->html .= '</form>';

        $this->html .= '<footer>&copy; 2019 <p id="sources">Sources: commons.wikimedia.org/wiki/File:Kanchenjunga_India.jpg</p></footer>';


    // JavaScript
        $this->html .= '<script>';
        $this->html .= '$("\#button").click(function() {';

        $this->html .= 'document.body.style.backgroundColor = "\#ED6353";';

        $this->html .= 'document.getElementById("image").style.backgroundImage = "url(\'images/kanchenjunga.jpg\')";';
        $this->html .='document.getElementById("image").style.backgroundRepeat = "no-repeat";';
        $this->html .= 'document.getElementById("image").style.backgroundPosition = "bottom";';
        $this->html .= 'document.getElementById("image").style.backgroundSize = "cover";';

        $this->html .= 'document.getElementById("sun").style.visibility = "visible";';


        $this->html .= 'document.getElementById("button").style.display = "none";';
        $this->html .= 'document.getElementById("signin").style.visibility = "visibl\e";';

        $this->html .= 'document.getElementById("sources").style.visibility = "visible";';

        $this->html .= '});';


        //var_dump($this->data);

        $this->html .= '</script>';
        $this->html .='</body>';
        $this->html .= '</html>';
    }

    public function render()
    {
        echo $this->html;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return TemplateManager
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }


}
