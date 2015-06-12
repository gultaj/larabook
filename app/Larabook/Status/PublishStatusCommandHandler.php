<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 12.06.2015
 * Time: 5:01
 */

namespace Larabook\Status;


use Larabook\Status\Events\StatusWasPublished;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Commander\Events\EventGenerator;
use Status;

class PublishStatusCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $status = new Status(['body' => $command->body]);

        \Auth::user()->statuses()->save($status);
//        $status = Status::create([
//            'body' => $command->body,
//            'user_id' => \Auth::user()->id
//        ]);
        $status->raise(new StatusWasPublished($status));

        $this->dispatchEventsFor($status);
    }
}