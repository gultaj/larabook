<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 04.06.2015
 * Time: 4:45
 */

namespace Larabook\Registration;


class RegisterUserCommand {

    public $username;

    public $email;

    public $password;

    function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function all()
    {
        return [$this->username, $this->email, $this->password];
    }


}