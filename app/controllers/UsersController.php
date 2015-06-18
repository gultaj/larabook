<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the Users
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::orderBy('username', 'asc')->paginate(5);

		return View::make('users.index', compact('users'));
	}

    /**
     * Show user profile
     *
     * @param $username
     * @return \Illuminate\View\View
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();

        return View::make('users.show', compact('user'));
    }

}
