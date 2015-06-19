<?php namespace Larabook\Users;

class FollowUserCommand {
    public $followed_id;
    public $user_id;

    function __construct($follower_id, $user_id)
    {
        $this->followed_id = $follower_id;
        $this->user_id = $user_id;
    }


}