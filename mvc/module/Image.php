<?php
/**
 * Created by PhpStorm.
 * User: r_mot
 * Date: 8/31/2018
 * Time: 4:44 PM
 */
class ImageModule extends ParentClass
{
    public static function getImage($id)
    {
        $sql = "SELECT data FROM image WHERE id = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$id]) || !$stmt->rowCount())
            return false;
        return $stmt->fetchObject()->data;
    }
    public static function upload($data)
    {
        $sql = "INSERT INTO image(data)VALUES(?)";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$data]))
        {
            self::setCode(500);
            return false;
        }
        return getConn()->lastInsertId();
    }
}