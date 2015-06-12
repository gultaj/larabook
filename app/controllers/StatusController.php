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
        $statuses = Auth::user()->statuses;

		return View::make('statuses.index', compact('statuses'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
