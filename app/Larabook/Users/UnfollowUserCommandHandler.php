<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 19.06.2015
 * Time: 6:39
 */

namespace Larabook\Users;


use Laracasts\Commander\CommandHandler;

class UnfollowUserCommandHandler implements CommandHandler {

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = \User::findOrFail($command->user_id)->follows()->detach($command->unfollowed_id);
        return $user;
    }
}