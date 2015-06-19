<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 19.06.2015
 * Time: 6:38
 */

namespace Larabook\Users;


class UnfollowUserCommand {

    public $user_id;
    public $unfollowed_id;

    /**
     * @param $user_id
     * @param $unfollowed_id
     */
    function __construct($user_id, $unfollowed_id)
    {
        $this->user_id = $user_id;
        $this->unfollowed_id = $unfollowed_id;
    }


}