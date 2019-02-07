<?php

class TemplateManager
{
    protected $htmlOut;
    protected $data = [];

    public function loadTemplate() {

        $this ->htmlOut = '<!DOCTYPE html>';
        $this ->htmlOut .= '<html>';
        $this ->htmlOut .= '<head>';
        $this ->htmlOut .= '<title>Error 404 - Page not found!e</title>';

        //inline css
        $this ->htmlOut .= ' <style> body {
            background-color: lightblue;
        }
         h1, h2, p {
            margin-top: 40px;
            text-align: center; 
            }
         form {
            margin-top: 40px;
            text-align: center; 
            }            
            
        </style>';

        $this ->htmlOut .= '</head>';
        $this ->htmlOut .= '<body>';

        $this ->htmlOut .= '<h2>';
        $this ->htmlOut .= 'Hello '. $this->data['firstName'] . '  ' . $this->data['lastName'] . ','.'<br><br>';
        $this ->htmlOut .= 'whose age is '. $this->data['age'].'!';
        $this ->htmlOut .= '</h2>';

        $this ->htmlOut .= '<h1 style="color:blue;margin-left:30px;">This is ERROR 404 - PAGE NOT FOUND!</h1>';
        $this ->htmlOut .= '<p style="color:red;font-size:30px;"> Try it again! </p>';
//        $this ->htmlOut .= '<p> You can fill out the form, so we have list of unhappy users! </p>';

//        $this ->htmlOut .= '<form action="/action_page.php">
//        First name:<br>
//        <input type="text" name="firstname">
//        <br>
//        Last name:<br>
//        <input type="text" name="lastname">
//        <br>
//        Age:<br>
//        <input type="number" name="age">
//        <br><br>
//        <input type="submit" value="Submit">
//        </form>';
        $this ->htmlOut .= '</body>';
        $this ->htmlOut .= '</html>';
    }

    public function render () {

        echo $this->htmlOut;
    }

    public function setData($data)
    {
//        $dataStore = new DataStore();  
        $this->data = $data;
//        $this->data = $dataStore.getUsers(array('id' => '1')));
        return $this;
    }    

}