<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 04.06.2015
 * Time: 4:54
 */

namespace Larabook\Registration;


use Illuminate\Support\Facades\Auth;

use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Redirect, User, Validator;

class RegisterUserCommandHandler implements CommandHandler {

    use DispatchableTrait;
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::create([
            'username' => $command->username,
            'email' => $command->email,
            'password' => $command->password
        ]);

        $user->raise(new UserRegistered($user));

        $this->dispatchEventsFor($user);

        return $user;
    }
}