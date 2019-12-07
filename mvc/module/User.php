<?php


class UserModule extends ParentClass {

    public static function isCredOk($username , $password)
    {
        $sql = "SELECT 1 FROM users WHERE username = ? AND password = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$username , $password]))
        {
            self::setCode("Internal error");
            return false;
        }
        if(!$stmt->rowCount())
        {
            self::setCode("incorrect username or password");
            return false;
        }
        return true;
    }
    public static function updateToken($username , $token)
    {
        $sql = "UPDATE users SET token = ? WHERE username = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$token , $username]))
        {
            self::setCode("Internal error");
            return false;
        }
        return true;
    }
    public static function register($username ,$name, $password)
    {
        $sql = "INSERT INTO users (username, name, password, token,unique_id) VALUES (?,?,?,?,?)";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$username , $name , $password,randomStr(10),rand(10000,999999)]))
        {
            self::setCode("internal error");
            return false;
        }
        return true;
    }
    public static function getUserInfo($usernameOrId)
    {
        $sql = "SELECT * FROM users WHERE  username = ? OR id = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$usernameOrId , $usernameOrId]) || !$stmt->rowCount())
        {
            self::setCode(500);
            return false;
        }
        return $stmt->fetchObject();
    }
    public static function getId($username)
    {
        $sql = "SELECT id FROM users WHERE username = ? or token = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$username , $username]))
        {
            self::setCode(500);
            return false;
        }
        if(!$stmt->rowCount())
        {
            self::setCode("User not found");
            return false;
        }
        return $stmt->fetchObject()->id;
    }
    public static function authenticated($token)
    {
        $sql = "SELECT 1 FROM users WHERE token = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$token]))
        {
            self::setCode(500);
            return false;
        }
        if(!$stmt->rowCount())
        {
            self::setCode("Not Authenticated.");
            return false;
        }
        return true;
    }
    public static function getWishes($owner_id)
    {
        $sql = "SELECT * FROM wish WHERE owner = ? order by id desc";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$owner_id]))
        {
            self::setCode(500);
            return false;
        }
        return $stmt->fetchAll();
    }
    public static function findUsingSHare($data)
    {
        $sql = "SELECT * FROM users WHERE unique_id = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$data]))
        {
            self::setCode(500);
            return false;
        }
        return $stmt->fetchObject();
    }
    public static function removeWish($owner_id,$board_id)
    {
        $sql= "DELETE FROM wish WHERE owner = ? AND id = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$owner_id , $board_id]))
        {
            self::setCode(500);
            return false;
        }
        return true;
    }

    public static function getBoard($id , $owner)
    {
        $sql = "SELECT * FROM wish WHERE id = ? AND (owner = ? OR shared='1')";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$id , $owner]))
        {
            self::setCode(500);
            return false;
        }
        if(!$stmt->rowCount())
        {
            self::setCode(3);
            return false;
        }
        return $stmt->fetchObject();
    }
    public static function addWish( $owner_id , $title , $info ,$img)
    {
        $sql = "INSERT INTO wish(title, extra, image , owner) VALUES(?,?,? , ?)";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$title , $info , $img,$owner_id]))
        {
            self::setCode(500);
            return false;
        }
        return true;
    }
    public static function check($owner , $board)
    {
        $sql = "UPDATE wish SET checked = '1' WHERE owner = ? AND id = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$owner , $board]))
        {
            self::setCode(500);
            return false;
        }
        if(!$stmt->rowCount())
        {
            self::setCode("Wish not found");
            return false;
        }
        return true;
    }
    public static function setcheker($board , $name)
    {
        $sql = "UPDATE wish SET checker = ? WHERE id = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$name , $board]))
        {
            self::setCode(500);
            return false;
        }
        return true;
    }
    public static function checked($owner,$board)
    {
        $sql = "SELECT 1 FROM wish WHERE owner = ? and id = ? and checked = 1";
        $stmt= getConn()->prepare($sql);
        if(!$stmt->execute([$owner , $board]))
        {
            self::setCode(500);
            return false;
        }
        return $stmt->rowCount();
    }
    public static function uncheck($owner , $board)
    {
        $sql = "UPDATE wish SET checked = '0' WHERE owner = ? AND id = ?";
        $stmt = getConn()->prepare($sql);
        if(!$stmt->execute([$owner , $board]))
        {
            self::setCode(500);
            return false;
        }
        if(!$stmt->rowCount())
        {
            self::setCode("Wish not found");
            return false;
        }
        return true;
    }

}