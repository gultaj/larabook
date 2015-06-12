<?php namespace Larabook\Status\Events;

class StatusWasPublished {

    public $status;

    function __construct(\Status $status)
    {
        $this->status = $status;
    }


}