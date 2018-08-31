<?php
/**
 * Created by PhpStorm.
 * User: r_mot
 * Date: 8/30/2018
 * Time: 4:01 PM
 */

class Config{
    /* @var string*/
    const DB_USERNAME = "";
    /* @var string*/
    const DB_PASSWORD = "";
    /* @var string*/
    const DB_NAME = "";

    /* @var string*/
    const DATE_FORMAT = "yyyyMMddHHmmss";

    /* @var PDO*/
    public static $DB = [];
    /* @var array*/
    public static $DB_CONFIG = [];

    /* @var array*/
    public static $Site = [
        'base_url'=>'/s/Base',
        'route'=>[]
    ];
}