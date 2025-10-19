<?php 

	//ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    //if (session_status() === PHP_SESSION_NONE) {
    //    $sessionPath = __DIR__ . '/tmp';
    //    if (!file_exists($sessionPath)) mkdir($sessionPath, 0777, true);
    //    session_save_path($sessionPath);
    //    session_start();
    //}
    error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();
    require_once 'app/init.php';

    $app = new App;