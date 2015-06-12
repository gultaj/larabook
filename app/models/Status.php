<?php

use Laracasts\Commander\Events\EventGenerator;

class Status extends \Eloquent {

    use EventGenerator;

	protected $fillable = ['body'];

    public static $rules = [
        'body' => 'required|min:10'
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }
}