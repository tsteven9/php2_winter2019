<?php

class TemplateManager
{
    protected $htmlOut;
    protected $data = [];

    public function loadTemplate()
    {
        $this->htmlOut = '<!doctype html>';
        $this->htmlOut .= '<html lang="en">';
        $this->htmlOut .= '<head>';
        $this->htmlOut .= ' <meta charset="utf-8">';
        $this->htmlOut .= '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        $this->htmlOut .= '<title>Hello World!</title>';
        $this->htmlOut .= '</head>';
        $this->htmlOut .= '<body>';
        $this->htmlOut .= '<h1>Hello ' . $this->data['firstName'] . ' ' . $this->data['lastName']  . '!</h1>';
        $this->htmlOut .= '<h2>You are ' . $this->data['age'] . ' years old!</h2>';
        $this->htmlOut .= '</body>';
        $this->htmlOut .= '</html>';
    }

    public function render()
    {
        echo $this->htmlOut;
    }

    /**
     * @return mixed
     */
    public function getHtmlOut()
    {
        return $this->htmlOut;
    }

    /**
     * @param mixed $htmlOut
     * @return TemplateManager
     */
    public function setHtmlOut($htmlOut)
    {
        $this->htmlOut = $htmlOut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return TemplateManager
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }




}