<?php

class UserController
{
    public function actionRegister()
    {

        $name= '';
        $email = '';
        $password = '';
        $emailLogin = '';
        $passwordLogin = '';
        $result = false;

        if(isset($_POST['regSubmit']))
        {
            $name = htmlspecialchars($_POST['regName']);
            $email = htmlspecialchars($_POST['regEmail']);
            $password = htmlspecialchars($_POST['regPassword']);
            $_SESSION["regName"] = $name;
            $_SESSION["regEmail"] = $email;

            $errors = false;

            if (!User::checkName($name))
            {
                $errors['name'] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email))
            {
                $errors['email'] = 'Неправильный email';
            }
            if (!User::checkPassword($password))
            {
                $errors['password'] = 'Пароль не должен быть короче 6-ти символов';
            }

            if(User::checkEmailExists($email))
            {
                $errors['checkEmail'] = 'Такой email уже используется';
            }

            if($errors == false)
            {
                $result = User::register($name,$email,$password);
            }

        }

        if(isset($_POST['submitLogin']))
        {
            $emailLogin = htmlspecialchars($_POST['emailLogin']);
            $passwordLogin = htmlspecialchars($_POST['passwordLogin']);
            $_SESSION['emailLogin'] = $emailLogin;

            $errorsLogin = false;

            if (!User::checkEmail($emailLogin))
            {
                $errorsLogin['emailLogin'] = 'Неправильный email';
            }
            if (!User::checkPassword($passwordLogin))
            {
                $errorsLogin['passwordLogin'] = 'Пароль не должен быть короче 6-ти символов';
            }

            if($errorsLogin == false) {
                $userId = User::checkUserData($emailLogin, $passwordLogin);


                if ($userId == false) {
                    $errorsLogin['wrongData'] = 'Неправильный email/пароль!';
                } else {
                    User::auth($userId);

                    header("Location: /cabinet/");
                }
            }
        }
        require_once (ROOT. '/views/user/register.php');
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }

}