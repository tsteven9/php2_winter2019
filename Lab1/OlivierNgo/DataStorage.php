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

    public function getQuote()
    {
        return "'";
    }

  /*  public function getUsers(array $where = array(), $andOr = 'AND')
    {
        $query = 'SELECT `id`,`firstname`,`lastname`,`age` FROM `users`';
        if ($where) {
            $query .= ' WHERE ';
            foreach ($where as $column => $value) {
                $query .= $column . ' = ' . $this->getQuote() . $value . $this->getQuote() . ' ' . $andOr;
            }
            $query = substr($query, 0, -(strlen($andOr)));
        }
        $this->link = $this->getConnection();
        $result = mysqli_query($this->link, $query);
        return mysqli_fetch_all($result);

    }*/
    public function getUsers()
    {
        $query = 'SELECT `id`,`firstname`,`lastname`,`age` FROM `users`';
        $this->link = $this->getConnection();
        $result = mysqli_query($this->link, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }



    /**
     * @return mixed
     */
    public function getFirstName()
    {
        $row = $this->getUsers();
        $this->firstName = $row ['firstname'];
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
        $row = $this->getUsers();
        return $this->lasttName = $row['lastname'];
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
        $row = $this->getUsers();
        return $this->age = $row['age'];
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

