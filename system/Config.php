<?php
/**
 * Created by PhpStorm.
 * User: r_mot
 * Date: 8/30/2018
 * Time: 4:01 PM
 */

class Config{
    /* @var array*/
    const DB = [
        'name'=>'',
        'username'=>'',
        'password'=>'',
        'config'=>[
        ]
    ];
    /* @var string*/
    const DATE_FORMAT = "yyyyMMddHHmmss";

    /* @var PDO*/
    public static $DB = [

    ];
    /* @var array*/
    const SITE = [
        'base_url'=>'/s/Base',
        'route'=>[

        ]
    ];
}