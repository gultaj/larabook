<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('post statuses to my profile');

$I->signIn();

$I->assertTrue(Auth::check());

$I->amOnPage('statuses');

$post = ['body' => 'My first post!'];

$I->postAStatus($post);

$I->seeCurrentUrlEquals('/statuses');
$I->see($post['body']);
