<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 04.06.2015
 * Time: 9:34
 */

namespace Larabook\Registration\Events;


use User;

class UserRegistered {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }


}