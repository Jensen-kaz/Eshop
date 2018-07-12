<?php

class CabinetController
{

    public function actionIndex()
    {
        $userId = User::checkLogged(); // ф-я возвращает id зарегестрированного польз.

        //Получаем массив с данными пользователя
        $user = User::getUserById($userId);
        $_SESSION['cabinetUserName'] = $user['name'];
        $_SESSION['cabinetUserEmail'] = $user['email'];

        require_once(ROOT. '/views/cabinet/index.php');

        return true;
    }

    public function actionEdit()
    {

//        $userId = User::checkLogged();
//        $user = User::getUserById($userId);
//
//        if(isset($_POST['submit']))
//        {
//            $name = htmlspecialchars($_POST['name']);
//            $password = htmlspecialchars($_POST['password']);
//            $_SESSION['nameEdit'] = $name;
//
//            $errorsEdit = false;
//
//            if (!User::checkName($name))
//            {
//                $errorsEdit['name'] = 'Имя не должно быть короче 2-х символов';
//            }
//
//            if (!User::checkPassword($password))
//            {
//                $errorsEdit['password'] = 'Пароль не должен быть короче 6-ти символов';
//            }
//
//            if($errorsEdit == false)
//            {
//                $result = User::edit($userId,$name,$password);
//            }
//        }

        require_once (ROOT. '/views/cabinet/edit.php');
        return true;
    }

    public function actionEditname()
    {
        $result = false;
        $userId = User::checkLogged();

        if(isset($_POST['submit']))
        {
            $name = htmlspecialchars($_POST['name']);

            $errorsEdit = false;

            if(!User::checkName($name))
            {
                $errorsEdit[] = 'Имя не должно быть короче 2-х символов';
            }

            if($errorsEdit == false)
            {
                $result = User::editName($name,$userId);
                $_SESSION['cabinetUserName'] = $name;
            }
        }

        require_once (ROOT. '/views/cabinet/editName.php');
        return true;
    }

    public function actionEditemail()
    {
        $result = false;
        $userId = User::checkLogged();

        if(isset($_POST['submit']))
        {
            $email = htmlspecialchars($_POST['email']);

            $errorsEdit = false;

            if(!User::checkEmail($email))
            {
                $errorsEdit[] = 'Email введен не верно';
            }

            if(User::checkEmailExists($email))
            {
                $errorsEdit[] = 'Этот email уже существует';
            }

            if($errorsEdit == false)
            {
                $result = User::editEmail($userId,$email);
                $_SESSION['cabinetUserEmail'] = $email;
            }
        }

        require_once(ROOT.'/views/cabinet/editEmail.php');
        return true;
    }

    public function actionEditpassword()
    {
        $result = false;
        $userId = User::checkLogged();

        if(isset($_POST['submit']))
        {
            $password = htmlspecialchars($_POST['password']);

            $errorsEdit = false;

            if(!User::checkPassword($password))
            {
                $errorsEdit[] = 'Пароль должен быть не меньше 6-ти символов';
            }

            if($errorsEdit == false)
            {
                $result = User::editPassword($userId,$password);
            }
        }

        require_once(ROOT.'/views/cabinet/editPassword.php');
        return true;
    }
}