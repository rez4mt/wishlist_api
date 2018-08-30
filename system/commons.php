<?php
/**
 * Created by PhpStorm.
 * User: r_mot
 * Date: 8/30/2018
 * Time: 4:05 PM
 */

function getConn()
{
    if(Config::$DB !== null)
        return Config::$DB;

    try{
        Config::$DB = new PDO(
            "mysql:host=localhost;dbname=".Config::DB_NAME,
            Config::DB_USERNAME,
            Config::DB_PASSWORD,Config::$DB_CONFIG
        );
    }catch (Exception $e){
        echo ($e->getTraceAsString());
        die;
    }
    return getConn();
}



function strhas($string, $search, $caseSensitive = false)
{
    if ($caseSensitive) {
        return strpos($string, $search) !== false;
    } else {
        return (strpos(strtolower($string), strtolower($search)) !== false || strpos(strtolower($search), strtolower($string)) !== false);
    }
}
function str_rep($old,$new,&$str){
    $str = str_replace($old,$new,$str);
}
function str_rm($word,&$str){
    $str = str_replace($word,"",$str);
}
function classify(&$name,$return = false){
    if(!$return)
    {
        $name = ucfirst(strtolower($name));
        return true;
    }
    else return $name;
}
function getRequestUri()
{
    global $_SERVER;
    return $_SERVER['REQUEST_URI'];
}
function getBaseUrl()
{
    return Config::$Site['base_url'];
}