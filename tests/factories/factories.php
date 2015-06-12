<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 10.06.2015
 * Time: 10:31
 */

$factory('User', [
    'email' => $faker->email,
    'password' => $faker->password,
    'username' => $faker->userName,
    'created_at' => time(),
    'updated_at' => time(),
]);

$factory('Status', [
    'user_id' => 'factory:User',
    'body' => $faker->text(),
    'created_at' => time(),
    'updated_at' => time()
]);