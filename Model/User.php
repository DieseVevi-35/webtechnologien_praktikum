<?php
// Wie in Java gibt es eine Möglichkeit
// Code (insbesondere Klassen) zu strukturieren
// -> hier namespaces
// -> in Java z.B. java.utils.io.Irgendwas
// -> in PHP: Model\User
namespace Model;

use JsonSerializable;

class User implements JsonSerializable
{
    private $username;
    private $firstName;
    private $lastName;
    private $about;
    private $drink;
    private $layout;


    public function __construct($username = "")
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
        // define getter and setters
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setAbout($about)
    {
        $this->about = $about;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function setDrink($drink)
    {
        $this->drink = $drink;
    }

    public function getDrink()
    {
        return $this->drink;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function getLayout()
    {
        return $this->layout;
    }





    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    public static function create($username) {
        $user = new User();
        $user->username = $username;

        return $user;
    }

    public static function fromJson($data) {
        $user = new User();
        foreach ($data as $key => $value) {
            $user->{$key} = $value;
        }
        return $user;
    }
}
