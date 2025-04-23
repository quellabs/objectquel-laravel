<?php
	
	return [
		/*
		|--------------------------------------------------------------------------
		| Database Connection
		|--------------------------------------------------------------------------
		|
		| Set the database connection details for ObjectQuel.
		|
		*/
		'database' => [
			'driver' => env('DB_DRIVER', 'mysql'),
			'host' => env('DB_HOST', '127.0.0.1'),
			'port' => env('DB_PORT', '3306'),
			'database' => env('DB_DATABASE', 'forge'),
			'username' => env('DB_USERNAME', 'forge'),
			'password' => env('DB_PASSWORD', ''),
			'charset' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
			'prefix' => '',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Entity Paths
		|--------------------------------------------------------------------------
		|
		| Define the paths where your entities are located.
		|
		*/
		'entity_paths' => [
			app_path('Entities'),
		],
		
		/*
		|--------------------------------------------------------------------------
		| Cache Settings
		|--------------------------------------------------------------------------
		|
		| Configure the caching behavior of ObjectQuel.
		|
		*/
		'cache' => [
			'enabled' => env('OBJECTQUEL_CACHE_ENABLED', true),
			'path' => storage_path('framework/cache/objectquel'),
		],
		
		/*
		|--------------------------------------------------------------------------
		| Proxy Settings
		|--------------------------------------------------------------------------
		|
		| Configure the proxy behavior of ObjectQuel.
		|
		*/
		'proxy' => [
			'namespace' => 'ObjectQuelProxies',
			'path' => storage_path('framework/objectquel/proxies'),
			'auto_generate' => env('OBJECTQUEL_PROXY_AUTOGENERATE', true),
		],
	];