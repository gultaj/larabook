<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;
use Laracasts\Commander\CommandBus;

class FollowsController extends \BaseController {

    private $command;

    function __construct(CommandBus $command)
    {
        $this->command = $command;
    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $this->command->execute(new FollowUserCommand(Input::get('user_id'), Auth::id()));

        return Redirect::back()->with(['notify.type' => 'success', 'notify.message' => 'This user are followed']);

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->command->execute(new UnfollowUserCommand(Auth::id(), $id));

        return Redirect::back()->with(['notify.type' => 'success', 'notify.message' => 'This user are unfollowed']);
	}


}
