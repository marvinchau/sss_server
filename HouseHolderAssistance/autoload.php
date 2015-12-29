<?php


require_once __DIR__ . '/src/Utilities/Config.php';


spl_autoload_register(function ($class)
{
	// project-specific namespace prefix
	$prefixArr = array(
			'Utilities\\',
			'Database\\',
			'Controllers\\',
			'Models\\'
	);

	// base directory for the namespace prefix
	$base_dir = null;

	for($i=0;$i< sizeof($prefixArr);$i++)
	{
		$len = strlen($prefixArr[$i]);
		if (strncmp($prefixArr[$i], $class, $len) === 0) {
			// no, move to the next registered autoloader
			$base_dir = substr(__DIR__ . '/src/'.$prefixArr[$i], 0, -1) ."/";
			break;
		}
			

	}
	if($base_dir == null)
	{
		return;
	}

	// get the relative class name
	$relative_class = substr($class, $len);

	// replace the namespace prefix with the base directory, replace namespace
	// separators with directory separators in the relative class name, append
	// with .php
	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
	// if the file exists, require it
	if (file_exists($file)) {
		require $file;
	}
});