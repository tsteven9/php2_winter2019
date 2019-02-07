<?php

class DataStore
{
    protected $firstName = '';
    protected $lastName = '';
    protected $age = 200;
    protected $myArray = [];

    public function getConnection()
    {
        if (!isset($link)) {
            static $link = NULL;
        }

        if ($link === NULL) {
            $link = mysqli_connect('localhost:3306', 'root', '', 'evgeniyadb');
        }
        return $link;
    }

    public function closeConnection()
    {
        if (!isset($link)) {
            static $link = NULL;
            return FALSE;
        } else {
            mysqli_close($link);
            return TRUE;
        }
    }

    public function getQuote()
    {
        return "'";
    }

// SELECT `id`,`firstname`,`lastname` FROM `customers` WHERE x=y
// $where = [key = column name, value = data]
// $andOr = AND | OR
    public function getUsers(array $where = array(), $andOr = 'AND')
    {
        
        $query = 'SELECT `id`,`firstname`,`lastname`, `age` FROM `users`';
        if ($where) {
            $query .= ' WHERE ';
            foreach ($where as $column => $value) {
                $query .= $column . ' = ' . $this->getQuote() . $value . $this->getQuote() . ' ' . $andOr;
            }
            $query = substr($query, 0, -(strlen($andOr)));
        }
        $link = $this->getConnection();
        $result = mysqli_query($link, $query);
        $this->closeConnection();
//        var_dump(mysqli_fetch_all($result));
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
 

    public function getFirstName()
    {
        $firstrow = $this->getUsers(array('id' => '1'))[0];
        $this->firstName = $firstrow['firstname'];
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }


    public function getLastName()
    {
        $firstrow = $this->getUsers(array('id' => '1'))[0];
        $this->lastName = $firstrow['lastname'];
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getAge()
    {
        
        $firstrow = $this->getUsers(array('id' => '1'))[0];
        $this->age = $firstrow['age'];
        return $this->age;
    }


    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

}