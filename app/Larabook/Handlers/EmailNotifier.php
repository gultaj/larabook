<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 19.06.2015
 * Time: 9:53
 */

namespace Larabook\Handlers;


use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

    public function whenUserRegistered(UserRegistered $event)
    {
        $subject = 'Welcome to Larabook!';
        $user = $event->user;
        $data = [];

        \Mail::queue('emails.registration.notifer', $data, function($message) use ($user, $subject) {
           $message->to($user->email)->subject($subject);
        });
    }

}