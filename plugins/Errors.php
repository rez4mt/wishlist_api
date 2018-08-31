<?php
/**
 * Created by PhpStorm.
 * User: r_mot
 * Date: 8/31/2018
 * Time: 5:18 PM
 */
class Errors{

    private static $_Errors = [

        '0'=>'Invalid Request Format',
        '1'=>'Request out of date',
        '2'=>'Parameters not found',
        '500'=>'Internal Error',
        '501'=>'Invalid Request Method',
        'unk'=>'Unknown error'
        ];

    static function exists($code)
    {
        return isset(self::$_Errors[$code]);
    }

    static function getErrorMsg($error)
    {
        if(isset(self::$_Errors[$error]))
            return self::$_Errors[$error];
        else
            return self::$_Errors['unk'];
    }
}