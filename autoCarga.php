<?php
header("Content-Type: text/html;charset=utf-8");

require("clases/error.php");

date_default_timezone_set('Europe/Madrid');
// function __autoload($className)
// {
// 	require("clases/$className.php");
// }
function autoload_clases($class_name)
{
	$file = 'clases/' . $class_name. '.php';
	if (file_exists($file))
	{
		require_once($file);
	}
}
spl_autoload_register('autoload_clases');

require("libs/FirePHPCore/FirePHP.class.php");
?>