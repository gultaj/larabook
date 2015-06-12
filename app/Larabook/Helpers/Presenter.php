<?php
/**
 * Created by PhpStorm.
 * User: progasu
 * Date: 12.06.2015
 * Time: 9:19
 */


class Presenter {
    public static function gravatar($email, $size = 30)
    {
        return '//www.gravatar.com/avatar/' . md5($email) . '?s=' . $size;
    }
}