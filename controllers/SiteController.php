<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        $recomendedProduct = array();
        $recomendedProduct = Product::getRecomendedProducts();

        require_once (ROOT. '/views/site/index.php');
        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userSubject = '';
        $userMessage = '';
        $result = false;

        if (isset($_POST['submit']))
        {
            $userEmail = htmlspecialchars($_POST['emailUser']);
            $userSubject = htmlspecialchars($_POST['subjectUser']);
            $userMessage = htmlspecialchars($_POST['userMessage']);
            $_SESSION['userSubject'] = $userSubject;
            $_SESSION['userEmail'] = $userEmail;

            $errors = false;

            //Валидация полей
            if(!User::checkEmail($userEmail))
            {
                $errors[] = 'Неправильный email';
            }

            if($errors == false)
            {
                $mail = 'eshopsupport@gmail.com';
                $subject = $userSubject;
                $message = $userMessage;
                $headers = "Content-type:text/html; charset = windows-1251 \r\n";
                $headers.= "From: {$userEmail} ";
                $headers.= "Reply to {$userEmail}";
                $result = mail($mail, $subject, $message,$headers);
            }

        }
        require_once (ROOT.'/views/site/contact.php');
        return true;
    }
}