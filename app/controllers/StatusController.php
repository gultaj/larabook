<?php

use Larabook\Status\PublishStatusCommand;
use Laracasts\Commander\CommandBus;

class StatusController extends \BaseController {

    private $command;

    function __construct(CommandBus $command)
    {
        $this->command = $command;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = Status::where('user_id', '=', Auth::user()->id)->with('user')->latest()->get();

		return View::make('statuses.index', compact('statuses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make($data = Input::only('body'), Status::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->command->execute(new PublishStatusCommand($data['body']));

        return Redirect::refresh()->with(['notify.type' => 'success', 'notify.message' => 'Posted a new Status!']);
	}

}
