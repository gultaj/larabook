<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('login to my Larabook account');
$I->signIn();

$I->seeRecord('users', [
    'email' => 'user@example.com'
]);
$I->seeInCurrentUrl('/statuses');
$I->see('Post a Status!');
$I->assertTrue(Auth::check());
