<?php namespace Larabook\Status;

class PublishStatusCommand {

    public $body;

    /**
     * @param $body
     */
    function __construct($body)
    {
        $this->body = $body;
    }


}