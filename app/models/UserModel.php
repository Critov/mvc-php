<?php
namespace app\models;

use Exception;

require_once dirname(__DIR__,2) . '/database.php';

class UserModel
{
    private $userId;
    private $userFirstName;
    private $userLastName;

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    public function getUserLastName()
    {
        return $this->userLastName;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;
    }

    public function setUserLastName($userLastName)
    {
        $this->userLastName = $userLastName;
    }

    public function createUser()
    {
        // code
    }

    public function readUser()
    {
        if(array_key_exists($this->getUserId(),USUARIOS))
        {
            return USUARIOS[$this->getUserId()];
        }
        else
        {
            return null;
        }
    }

    public function updateUser()
    {
        // code
    }

    public function deleteUser()
    {
        // code
    }

}