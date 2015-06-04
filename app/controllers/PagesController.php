<?php

class PagesController extends \BaseController {

    public function home()
    {
        return View::make('pages.home');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return View::make('pages.contact');
    }

}
