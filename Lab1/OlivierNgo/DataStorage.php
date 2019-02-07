<?php
/**
 * Created by PhpStorm.
 * User: O_NGO
 * Date: 2019-02-06
 * Time: 7:19 PM
 */

class dataStorage
{
    protected $firstName;
    protected $lastName;
    protected $age;
    protected $link;


    public function getConnection()
    {
        if (!isset($link)) {
            $this->link = NULL;
        }

        if ($this->link === NULL) {
            $this->link = mysqli_connect('localhost:3307', 'root', null, 'olivierngo');
        }
        return $this->link;
    }

    public function closeConnection()
    {
        if (!isset($this->link)) {
            $this->link = NULL;
            return FALSE;
        } else {
            mysqli_close($this->link);
            return TRUE;
        }
    }

    public function getCustomers(array $where = array(), $andOr = 'AND')
    {
        $query = 'SELECT `id`,`firstname`,`lastname` FROM `users`';
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
    }

    $myArray = getCustomers(array('id' => '3'));

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

    /**
     * @return mixed
     */



}

