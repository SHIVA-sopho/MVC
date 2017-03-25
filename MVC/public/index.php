<?php 

	require_once __DIR__ ."/../vendor/autoload.php";
	ToroHook::add("404", function(){
		echo "404 bhag bhosdike Error";
		http_response_code(404);
	});
	Toro::serve([
		'/' => Link\Controllers\HomeController::class,
		'/home' => Link\Controllers\HomeController::class,
		'/loginpage' => Link\Controllers\LoginController::class,
		'/registerpage' => Link\Controllers\RegisterController::class,
		'/login' => Link\Controllers\LoginController::class,
		'/register' => Link\Controllers\RegisterController::class,
		'/dashboard' => Link\Controllers\DashboardController::class,
		'/logout' => Link\Controllers\LogoutController::class
	]);


