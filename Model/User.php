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

    public function __construct($username = "")
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
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
