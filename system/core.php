<?php
/**
 * Created by PhpStorm.
 * User: r_mot
 * Date: 8/30/2018
 * Time: 10:44 PM
 */


function __autoload($class_name)
{


    if(strhas("Controller",$class_name))
    {
        str_rm("Controller",$class_name);
        classify($class_name);
        try{
            if(!@require_once (__DIR__ . "/../mvc/controller/$class_name.php"))
            {
                throw new Exception("File not found.");
            }
        }catch (Exception $e){

        }
        //load controller
        return;
    }
    if(strhas("View",$class_name))
    {
        str_rm("View",$class_name);
        classify($class_name);

        //load controller
        try{
            if(!@require_once (__DIR__ . "/../mvc/view/$class_name.php"))
            {
                throw new Exception("View not found.");
            }
        }catch (Exception $e){
        }
        return;
    }

    if(strhas("Module",$class_name))
    {
        str_rm("Module",$class_name);
        classify($class_name);
        //load controller
        try{
            if(!@require_once (__DIR__ . "/../mvc/module/$class_name.php"))
            {
                throw new Exception("Module not found.");
            }
        }catch (Exception $e){

        }
        return;
    }

    classify($class_name);

    if(file_exists(__DIR__."/plugins/$class_name.php"))
    {
        include __DIR__."/../plugins/$class_name.php";
        return;
    }



}

