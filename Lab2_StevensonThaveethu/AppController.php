<?php
/**
 *
 * Author: Stevenson Thaveethu
 * Date: March 6, 2019
 * 
 * Description: Handles the user input, and transfers the information to the model.
 *
 */


require 'AppModel.php';
require 'AppView.php';


class AppController
{
    
    protected $data = array();
    protected $viewManager;
	
    public function indexAction()
    {
        
        // <====== Output buffer. ======> 
        
        ob_start();
        
        // <====== Flags. ======>
        
        $loginCheck = FALSE;
        
        $validSession = FALSE;
        
        $postLoginForm = TRUE;
        
        // <====== Initialize app business and frontend messages. ======>
        
        $errorMessage = 0;
        
        $userMessage = '';
        
        // <====== Check if user is already logged in. ======> 
        
        if (isset($_COOKIE['loggedin']))
        {
            
            if ($validSession === FALSE)
            {
                
                $validSession = session_secure_init();
                
            }
            
            // <====== Check for cookie tampering. ======>
            
            if ($validSession === TRUE && isset($_SESSION['LOGGEDIN']))
            {
                
                $postLoginForm = FALSE;
                
            }
            else
            {
                
                $validSession = session_obliterate();
                
                $errorMessage = 3;
				
				$postLoginForm = TRUE;
                
            }
            
            // <====== Cookie login check done. ======>
            
            $loginCheck = TRUE;
            
        }
        
        
        // <====== Login verification. ======>
        
        if (isset($_POST['submit']) && $_POST['submit'] == 1 
									&& !empty($_POST['username']) 
									&& !empty($_POST['password']))
        {
            
            if ($validSession === FALSE)
            {
                
                $validSession = session_secure_init();
                
            }
            
            $username = (string) $_POST['username'];
            
            $password = (string) $_POST['password'];
            
            if (!ctype_alpha($username))
            {
                
                $username = preg_replace("/[^a-zA-Z]+/", "", $username);
                
            }
            
            if (strlen($username) > 40)
            {
                
                $password = substr($password, 0, 39);
                
            }
            
            
            // <====== Check credentials. ======>
            
            if (checkLogin($username, $password))
            {
                
                if ($validSession === TRUE)
                {
                    
                    // <====== Check for cookie tampering. ======>
                    
                    if (isset($_SESSION['LOGGEDIN']))
                    {
                        
                        $validSession = session_obliterate();
                        
                        $errorMessage = 3;
                        
                        $postLoginForm = TRUE;
                        
                    }
                    else
                    {
                        
                        setcookie('loggedin', TRUE, time() + 4200, '/');
                        
                        $_SESSION['LOGGEDIN'] = TRUE;
                        
                        $_SESSION['REMOTE_USER'] = $username;
                        
                        $postLoginForm = FALSE;
                        
                    }
                    
                }
                else
                {
                    
                    $validSession = session_obliterate();
                    
                    $errorMessage = 3;
                    
                    $postLoginForm = TRUE;
                    
                }
                
            }
            else
            {
                
                $validSession = session_obliterate();
                
                $errorMessage = 1;
                
                $postLoginForm = TRUE;
                
            }
            
            // <====== Username-password login check done. ======>
            
            $loginCheck = TRUE;
            
        }
        
        // <====== Intercept logout POST. ======>
        
        if (isset($_POST['logout']))
        {
            
            if ($validSession === FALSE)
            {
                
                session_secure_init();
                
            }
            
            $validSession = session_obliterate();
            
            $errorMessage = 2;
            
            $postLoginForm = TRUE;
            
        }
        
        // <====== Intercept invalid sessions and redirect to login page. ======>
        
        if ($loginCheck === TRUE && $validSession === FALSE && $errorMessage === 0)
        {
            
            if ($validSession === FALSE)
            {
                
                $validSession = session_secure_init();
                $validSession = session_obliterate();
                
            }
            
            $errorMessage  = 3;
            $postLoginForm = TRUE;
            
        }
        
        
        $this->data['userMessage'] = $userMessage;
        
        $this->data['errorMessage'] = $errorMessage;
        
        $this->data['postLoginForm'] = $postLoginForm;
        
        
        $this->viewManager = new AppView();
        
        $this->viewManager->setData($this->data);
        
        $this->viewManager->loadTemplate();
        
        $this->viewManager->render();
        
        
        ob_end_flush();
        
        
        flush();
        
        
        exit;
        
    }
    
}
