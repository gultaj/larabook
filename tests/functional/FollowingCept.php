<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('follow other Larabook users');

$user = 'OtherUser';

$I->haveAnAccount(['username' => $user]);
$I->signIn();

$I->click('Users');
$I->click($user);

$I->seeCurrentUrlEquals('/users/' . $user);
$I->click('Follow');
$I->seeCurrentUrlEquals('/users/' . $user);

$I->see('Unfollow');

$I->seeCurrentUrlEquals('/users/' . $user);
$I->click('Unfollow');
$I->seeCurrentUrlEquals('/users/' . $user);

