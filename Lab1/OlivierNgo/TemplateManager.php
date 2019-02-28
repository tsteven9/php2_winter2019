<?php
/**
 * Created by PhpStorm.
 * User: O_NGO
 * Date: 2019-02-06
 * Time: 6:45 PM
 */




class TemplateManager
{
    protected $htmlOut;
    protected $data =[];
    public function  loadTemplate()
    {
        $this->htmlOut = '<!DOCTYPE html>';
        $this->htmlOut .= '<html>';
        $this->htmlOut .= '<head>';
        $this->htmlOut .= '<meta charset="utf-8">';
        $this->htmlOut .= '<style>include \'CSS/main.css\';</style>';
        $this->htmlOut .= ' <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        $this->htmlOut .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
        $this->htmlOut .= '<link href="css/mystyle.css" rel="stylesheet">';
        $this->htmlOut .= '</head>';
        $this->htmlOut .= '<body>';
        $this->htmlOut .= '<p> hello  '
                        . $this->data['firstName']
                        . ' '
                        . $this->data['lastName']
                        .'<br /></p>';
        $this->htmlOut .= '<button name="submit", type="submit", value="1">Submit</button>';
        $this->htmlOut .= '<br />';

        $this->htmlOut .= '<button>Set the color property of all p elements</button>';
        $this->htmlOut .= '<script src="js/button.js"></script>';
        $this->htmlOut .= '</body>';
        $this->htmlOut .= '</html>';


    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


    public function render()
    {
        echo $this->htmlOut;
    }
}
