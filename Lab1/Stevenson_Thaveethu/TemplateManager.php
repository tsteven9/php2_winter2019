 <?php
/**
 * Created by PhpStorm.
 * User: s_thave
 * Date: 2019-02-06
 * Time: 6:45 PM
 */
class TemplateManager {
    protected $htmlOut;
    protected $data = [];

    public function loadTemplate() {
        $this->htmlOut = '<!DOCTYPE html>';
        $this->htmlOut .= '<html>';
        $this->htmlOut .= '<head>';
        $this->htmlOut .= '</head>';
        $this->htmlOut .= '<body>';
        $this->htmlOut .= '<h1>Hello there ' . $this->data['firstName'] . ' ' . $this->data['lastName'] . '!<br>';
        $this->htmlOut .= 'Our records indicate that you are currently ' . $this->data['age'] . ' years old. </h1><br>';
        $this->htmlOut .= 'Have a wonderful day! Bye! :)';
        $this->htmlOut .= '</body>';
        $this->htmlOut .= '</html>';
    }

    public function render() {
        echo $this->htmlOut;
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }
    
    /**
     * @param array $data
     * @return TemplateManager
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }
}
