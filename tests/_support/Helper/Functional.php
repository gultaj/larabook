<?php
namespace Helper;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Laracasts\TestDummy\Factory;

class Functional extends \Codeception\Module
{
    public function signIn()
    {
        $user = ['email' => 'user@example.com', 'password' => '123'];
        $I = $this->getModule('Laravel4');

        $this->haveAnAccount($user);

        $I->amOnPage('/login');

        $I->submitForm('#signin_form',[
            'email' => $user['email'],
            'password' => $user['password']
        ]);
    }

    public function haveAnAccount(array $overrides = [])
    {
        return $this->have('User', $overrides);
    }

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');

        $I->fillField('body', $body);
        $I->click('Post Status');
//        $this->have('Status', $overrides);
    }

    /**
     * @param $model
     * @param array $overrides
     * @return mixed
     */
    public function have($model, array $overrides)
    {
        return Factory::create($model, $overrides);
    }

}
