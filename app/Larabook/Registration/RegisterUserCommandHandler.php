<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 04.06.2015
 * Time: 4:54
 */

namespace Larabook\Registration;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Commander\CommandHandler;
use User;
use Validator;

class RegisterUserCommandHandler implements CommandHandler {

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $validator = Validator::make($data = $command->all(), User::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = User::create($data);


    }
}