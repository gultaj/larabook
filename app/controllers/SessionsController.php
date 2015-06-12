<?php


class SessionsController extends \BaseController {


    function __construct()
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make($data = Input::only('email', 'password'), User::$authRules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($data, true)) {
            return Redirect::intended('statuses')->with(['notify.type' => 'success', 'notify.message' => 'Welcome back!']);
        }

        return Redirect::back()->withInput()->with(['notify.type' => 'danger', 'notify.message' => 'We were unable to sign you in. Please check your credentials and try again!']);

    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::home()->with(['notify.type' => 'success', 'notify.message' => 'See you later!']);
    }

}
