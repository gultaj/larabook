<?php

use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;

class RegistrationController extends \BaseController {

    private $command;

    public function __construct(CommandBus $command)
    {
        $this->command = $command;
    }


    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        extract(Input::only('username', 'email', 'password'));

        $user = $this->command->execute(new RegisterUserCommand($username, $email, $password));

        Auth::login($user);

        return Redirect::home()->with(['notify.type' => 'success', 'notify.message' => 'Glad to have you as a new Larabook member!']);
	}

}
