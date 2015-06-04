<?php
$user = [
    'name' => 'Jhon Doe',
    'email' => 'jhondoe@mail.com',
];

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a Larabook account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', $user['name']);
$I->fillField('Email:', $user['email']);
$I->fillField('Password:', 'demo');
$I->fillField('Password Confirmation:', 'demo');

$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook!');
$I->seeRecord('users', ['username' => $user['name']]);

$I->assertTrue(Auth::check());