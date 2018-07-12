<?php
//session_set_cookie_params(60);
//ini_set('session.gc_maxlifetime',60);
session_start();

ini_set('display_errors',1);


//Подключение файлов системы
define('ROOT',dirname(__FILE__));
require_once (ROOT. '/components/Autoload.php');
spl_autoload_register('autoloadComponentsAndModels');


//$db = Db::getConnection();

//
//$prooducts = array();
//
//$result= $db->query("SELECT id, name, price, is_new FROM product WHERE status = '1' AND category_id = '3' "
//    . "ORDER BY id DESC LIMIT 12");
//
//
//
//$i=0;
//while($row = $result->fetch())
//{
//    $prooducts[$i]['id'] = $row['id'];
//    $prooducts[$i]['name'] = $row['name'];
//    $prooducts[$i]['price'] = $row['price'];
//    $prooducts[$i]['is_new'] = $row['is_new'];
//    $i++;
//}
//
//$i=0;
//while($i<count($prooducts)) {
//    echo '<br>';
//    print_r($prooducts[$i]);
//    echo '<br>';
//    $i++;
//}

//$_SESSION = array();
$router = new Router();
$router->run();


