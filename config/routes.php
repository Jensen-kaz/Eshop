<?php

return array(
    //Товары
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    //Каталог
    'catalog/page-([0-9]+)' => 'catalog/index/$1', //actionIndex в CatalogController
    'catalog' => 'catalog/index',   //actionIndex в CatalogController
    //Категории
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',  //actionCategory в CatalogController
    //Регистрация
    'user/register' => 'user/register',
    'user/logout' => 'user/logout',
    //ЛК пользователя
    'cabinet/editname' => 'cabinet/editname',
    'cabinet/editemail' => 'cabinet/editemail',
    'cabinet/editpassword' => 'cabinet/editpassword',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    //Контакты
    'contacts' => 'site/contact',
    //Корзина
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)'=> 'cart/add/$1',
    'cart/addAjax/([0-9]+)'=> 'cart/addAjax/$1',
    'cart/checkout' => 'cart/checkout',
    'cart' => 'cart/index',
    //Админпанель
    'admin' => 'admin/index',
    //Главная
    '' => 'site/index'  //actionIndex в siteController
);