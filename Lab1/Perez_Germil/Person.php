<?php


class Person
{
    protected $firstName;
    protected $lastName;
    protected $age;

    /**
     * Person constructor.
     */
    public function __construct()
    {
        $this->getPerson();
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function getConnection()
    {
        if (!isset($link)) {
            static $link = NULL;
        }

        if ($link === NULL) {
            $link = mysqli_connect('localhost:3307', 'root', '', 'php2db');
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

    public function getPerson()
    {
        $query = 'SELECT firstname, lastname, age FROM person';
        $link = $this->getConnection();
        $result = mysqli_query($link, $query);

        if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $this->closeConnection();

        $this->firstName = $row['firstname'];
        $this->lastName = $row['lastname'];
        $this->age = $row['age'];
    }

}