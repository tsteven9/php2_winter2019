<?php
/**
 *
 * Lab 3
 * 
 * Author: Stevenson Thaveethu
 * Date: March 25, 2019
 * 
 * Description: - Concerned with the business logic and the application data.
 *              - Used to perform data validations.
 * 
 * 
 */
 
namespace Application\Model;

class DataStorage
{

    public function getConnection($getLink = TRUE)
    {

        static $link = NULL;

        if ($link === NULL)
        {

            $link = mysqli_connect('localhost:3307', //Host
                                   'loginuser', //Username
                                   'testpass', //Password
                                   'andrew_session_app'); // Database

        } 
        elseif ($getLink === FALSE)
        {

            mysqli_close($link);

        }

        return $link;

    }


    public function getQuote()
    {

        return "'";

    }


    public function queryResults($query)
    {

        $link = $this->getConnection();

        $result = mysqli_query($link, $query);

        $values = mysqli_fetch_assoc($result);

        $this->getConnection(FALSE);

        return $values;

    }

    // SELECT `username`, `password` FROM `users` WHERE `username` LIKE $username;
    public function loginCheck($username, $password)
    {

        $query = 'SELECT `username`, `password` FROM `users` WHERE `username` LIKE ' 
                 . $this->getQuote() 
                 . $username 
                 . $this->getQuote();

        $values = $this->queryResults($query);

        $passwordVerified = password_verify($password, $values['password']);

        return $passwordVerified;

    }

}

