<?php
/**
 * Created by PhpStorm.
 * User: E_STROUD
 * Date: 2019-02-06
 * Time: 7:19 PM
 */

class DataStorage
{
    protected $firstName;
    protected $lastName;
    protected $age;
    public $myArray = [];


    function getConnection()
    {
        if (!isset($link)) {
            static $link = NULL;
        }

        if ($link === NULL) {
            $link = mysqli_connect('localhost:3307', 'root', '', 'ericadb');
        }
        return $link;
    }

    function closeConnection()
    {
        if (!isset($link)) {
            static $link = NULL;
            return FALSE;
        } else {
            mysqli_close($link);
            return TRUE;
        }
    }

    function getQuote()
    {
        return "'";
    }

// SELECT `id`,`firstname`,`lastname`, `age` FROM `users` WHERE x=y
// $where = [key = column name, value = data]
// $andOr = AND | OR
    function getCustomers(array $where = array(), $andOr = 'AND')
    {
        $query = 'SELECT `id`,`firstname`,`lastname`, `age` FROM `users`';
        if ($where) {
            $query .= ' WHERE ';
            foreach ($where as $column => $value) {
                $query .= $column . ' = ' . getQuote() . $value . getQuote() . ' ' . $andOr;
            }
            $query = substr($query, 0, -(strlen($andOr)));
        }
        $link = getConnection();
        $result = mysqli_query($link, $query);
        return mysqli_fetch_all($result);



        $myArray = getCustomers(array('id' => '1'));




        closeConnection();

    }



    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

}