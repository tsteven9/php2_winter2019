 <?php
/**
 * Created by PhpStorm.
 * User: s_thave
 * Date: 2019-02-06
 * Time: 7:19 PM
 */

class DataStorage {
    protected $firstName;
    protected $lastName;
    protected $age;

    public function __construct() {
        $this->getDataStorage();
    }

    /**
     * @return mixed
     */
    public function getConnection() {
        if (!isset($link)) {
            static $link = NULL;
        }

        if ($link === NULL) {
            $link = mysqli_connect('localhost:3307', 'root', '', 'stevensondb');
        }
        return $link;
    }

    public function closeConnection() {
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

    public function getDataStorage() {
        $query  = 'SELECT firstname, lastname, age FROM employees WHERE id = 3';
        $link   = $this->getConnection();
        $result = mysqli_query($link, $query);

        if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $this->closeConnection();

        $this->firstName = $row['firstname'];
        $this->lastName  = $row['lastname'];
        $this->age       = $row['age'];
    }

    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return DataStore
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return DataStore
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return DataStore
     */
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }


}
