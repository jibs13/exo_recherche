<?php
// var_dump($_POST);
$errors = [];
// try
// {
// 	throw new Exception("Mon message d'erreur YOLO \o/");
// }
// catch(Exception $exception)
// {
// 	$errors[] = $exception->getMessage();
// }
$db = mysqli_connect("192.168.1.52", "e-commerce", "e-commerce", "e-commerce");
session_start();// http://php.net/manual/fr/function.session-start.php
$access = ["errors","items"];
$page = "items";
if (isset($_GET['page']) && in_array($_GET['page'], $access)) // http://php.net/manual/fr/function.in-array.php
{
    $page = $_GET['page'];
}

// http://php.net/manual/fr/function.autoload.php
function __autoload($classname)
{
	require('models/'.$classname.'.class.php');
}

$access_traitement = ["login"=>"users"]; // comments

if (isset($_GET['page'], $access_traitement[$_GET['page']]))
{
	$traitement = $access_traitement[$_GET['page']];
	require('apps/traitement_'.$traitement.'.php');
}
require('apps/skel.php');
?>