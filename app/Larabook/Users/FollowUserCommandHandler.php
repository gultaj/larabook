<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 19.06.2015
 * Time: 4:47
 */

namespace Larabook\Users;


use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler {

    public function handle($command)
    {
        $user = \User::find($command->user_id);

        $user->follows()->attach($command->followed_id);

        return $user;
    }
}