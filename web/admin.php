<?php
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = "home";
}
//on appel une nouvelle instance
$app = App::getInstance();
$auth = new DBAuth($app->getDb());

//Verifier si on est passé par le poste- cnx utilisateur via login.php
if ($_POST) { 
	if (isset($_POST['username'], $_POST['password'])) {
		
		if ($auth->login($_POST['username'], $_POST['password'])) {
		//prévoir un message flash
		}else{
		header('location: index.php?p=login');
		exit(); //permet d'arreter le code
		}
	}
}

if (!$auth->logged()) {
	$app->forbidden();
}

$connect = 'Disconnect';


ob_start();
if ($page==='home') {
	require ROOT.'/pages/admin/index.php';
}elseif ($page==='posts.edit') {
	require ROOT.'/pages/admin/posts/index.php';
}elseif ($page==='posts.single') {
	require ROOT.'/pages/admin/posts/single.php';
}elseif ($page==='posts.add') {
	require ROOT.'/pages/admin/posts/add.php';
}elseif ($page==='posts.delete') {
	require ROOT.'/pages/admin/posts/delete.php';
	///////////////////suite pour categories//////////////
}elseif ($page==='categories.edit') {
	require ROOT.'/pages/admin/categories/index.php';
}elseif ($page==='categories.single') {
	require ROOT.'/pages/admin/categories/single.php';
}elseif ($page==='categories.add') {
	require ROOT.'/pages/admin/categories/add.php';
}elseif ($page==='categories.delete') {
	require ROOT.'/pages/admin/categories/delete.php';
}
$content = ob_get_clean();
require ROOT.'/pages/templates/default.php'; 