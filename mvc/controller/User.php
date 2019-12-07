<?php


class UserController{
    public function login($username , $password)
    {
        if(!UserModule::isCredOk($username , $password))
            output('error' , UserModule::getErrorCode());
        if(!UserModule::updateToken($username , randomStr(10)))
            output('error' , UserModule::getErrorCode());
        $data = UserModule::getUserInfo($username);
        output('ok' , $data);
    }
    public function register($username , $password , $name)
    {
        $data = UserModule::getUserInfo($username);
        if($data)
            output('error' ,'Username already exists.');
        if(!UserModule::register($username , $password , $name))
            output('error' , UserModule::getErrorCode());
        output('ok',UserModule::getUserInfo($username));
    }
    public function wishes($username)
    {
        $id = UserModule::getId($username);
        $list = UserModule::getWishes($id);
        output('ok' , $list);
    }
    public function remove($token , $wish_id)
    {
        if(!UserModule::authenticated($token))
            output('error' , UserModule::getErrorCode());
        $id = UserModule::getId($token);
        UserModule::removeWish($id , $wish_id);
        output('ok',null);
    }
    public function addWish($token , $title , $extra = "" )
    {
        //check if img exists
        if(strlen($extra) < 2)
            $extra = "";
        if(!UserModule::authenticated($token))
            output('error' , UserModule::getErrorCode());
        $id = UserModule::getId($token);
        //if image exists_upload it
        $img = null;
        if(isset($_FILES['img']))
        {
            $img = ImageModule::upload(file_get_contents($_FILES['img']['tmp_name']));
            if(!$img)
                output('error' , ImageModule::getErrorCode());
        }
        if(!UserModule::addWish($id,$title , $extra , $img))
            output('error' , UserModule::getErrorCode());
        output('ok',null);
    }
    public function check($id , $wish_id , $checker)
    {

        if(UserModule::checked($id , $wish_id))
        {
            $un = true;
            if(!UserModule::uncheck($id , $wish_id))
                output('error' , UserModule::getErrorCode());
        }else{
            $un = false;
            if(!UserModule::check($id , $wish_id))
                output('error' , UserModule::getErrorCode());
        }
        UserModule::setcheker($wish_id , $checker);
        output('ok',['res'=>$un]);
    }
    public function getWish($token , $wish)
    {
        if(!UserModule::authenticated($token))
            output('error' , UserModule::getErrorCode());
        $id = UserModule::getId($token);
        $wish_data = UserModule::getBoard($wish , $id);
        if(!$wish_data)
            output('error' , UserModule::getErrorCode());
        output('ok' , $wish_data);
    }
    public function getInfo($data)
    {
        output('ok' , UserModule::findUsingSHare($data));
    }
}