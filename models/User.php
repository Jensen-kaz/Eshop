<?php


class User
{
    public static function register($name,$email,$password)
    {
        $db=Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
              . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->bindParam(':password', password_hash($password,PASSWORD_DEFAULT), PDO::PARAM_STR);

        return $result->execute();
    }



    public static function checkName($name)
    {
        if(strlen($name) >= 2)
        {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if(strlen($password) >= 6)
        {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if(strlen($phone) == 12 && preg_match('/[+][0-9]{11}/',$phone))
        {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;

        return false;
    }

    public static function checkUserData($emailLogin, $passwordLogin)
    {
        $db = Db::getConnection();

        $sql = 'SELECT password,id FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $emailLogin, PDO::PARAM_STR);
        $result->execute();

        $done = array();
        $done = $result->fetch();

        if(password_verify($passwordLogin,$done['password']))
        {
          return $done['id'];
        }
        else
            return false;

    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * Метод возвращает id пользователя, если он зашел в ЛК.
     */
    public static function checkLogged()
    {
        if(isset($_SESSION['user']))
        { return $_SESSION['user']; }

        header("Location: /user/register");
    }

    public static function isGuest()
    {
        if(isset($_SESSION['user']))
        {return false;}

        return true;
    }

    public static function getUserById($id)
    {
        if($id)
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC); // Указываем, что получаем данные в виде массива
        $result->execute();

        return $result->fetch();
    }

//    public static function edit($userId,$name,$password)
//    {
//        $db= Db::getConnection();
//
//        $sql = "UPDATE user SET name = :name, password = :password WHERE id = :id";
//        $result = $db->prepare($sql);
//        $result->bindParam(':id',$userId,PDO::PARAM_INT);
//        $result->bindParam(':name',$name,PDO::PARAM_STR);
//        $result->bindParam(':password',password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
//        return $result->execute();
//    }

    public static function editName($name,$userId)
    {
        $db= Db::getConnection();

        $sql = "UPDATE user SET name = :name WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$userId,PDO::PARAM_INT);
        $result->bindParam(':name',$name, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function editEmail($userId,$email)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user SET email = :email WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$userId,PDO::PARAM_INT);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        return $result->execute();
    }

    public static function editPassword($userId,$password)
    {
        $db= Db::getConnection();

        $sql = "UPDATE user SET password = :password WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$userId,PDO::PARAM_INT);
        $result->bindParam(':password',password_hash($password,PASSWORD_DEFAULT), PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkZipCode($zipCode)
    {
        if(strlen($zipCode) >= 2 && strlen($zipCode) <= 9)
        {
            return true;
        }

        return false;
    }
}