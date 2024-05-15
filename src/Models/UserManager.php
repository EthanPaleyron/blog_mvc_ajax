<?php
namespace Project\Models;

use Project\Models\User;

class UserManager extends Manager
{
    public function find($username) // get user by name
    {
        $result = $this->bdd->prepare("SELECT * FROM user WHERE username = ?");
        $result->execute(
            array(
                $username
            )
        );
        $result->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\User");
        return $result->fetch();
    }
    public function store($password): void // add new user
    {
        $result = $this->bdd->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
        $result->execute(
            array(
                $_POST["username"],
                $password
            )
        );
    }
}