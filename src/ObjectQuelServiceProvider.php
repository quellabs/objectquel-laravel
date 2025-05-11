<?php
	
	namespace Quellabs\ObjectQuel\Laravel;
	
	use Illuminate\Support\ServiceProvider;
	use Quellabs\ObjectQuel\Configuration;
	use Quellabs\ObjectQuel\EntityManager;
	
	class ObjectQuelServiceProvider extends ServiceProvider {
		/**
		 * Register services.
		 *
		 * @return void
		 */
		public function register() {
			$this->mergeConfigFrom(
				__DIR__ . '/../config/objectquel.php', 'objectquel'
			);
			
			// Register the EntityManager in the service container
			$this->app->singleton(EntityManager::class, function ($app) {
				// Create a new Configuration instance with Laravel's configuration
				$config = new Configuration();
				
				// Get database configuration from Laravel's config
				$dbConfig = config('objectquel.database');
				
				// Set database parameters
				if (isset($dbConfig['dsn'])) {
					$config->setDsn($dbConfig['dsn']);
				} elseif (isset($dbConfig['driver'], $dbConfig['host'], $dbConfig['database'], $dbConfig['username'], $dbConfig['password'])) {
					$config->setDatabaseParams(
						$dbConfig['driver'],
						$dbConfig['host'],
						$dbConfig['database'],
						$dbConfig['username'],
						$dbConfig['password'],
						$dbConfig['port'] ?? 3306,
						$dbConfig['charset'] ?? 'utf8mb4',
						$dbConfig['options'] ?? []
					);
				} else {
					$config->setConnectionParams($dbConfig);
				}
				
				// Set entity configuration
				if ($entityPath = config('objectquel.entity_path')) {
					$config->setEntityPath($entityPath);
				}
				
				if ($entityNamespace = config('objectquel.entity_namespace')) {
					$config->setEntityNameSpace($entityNamespace);
				}
				
				// Set proxy configuration
				if ($proxyDir = config('objectquel.proxy_dir')) {
					$config->setProxyDir($proxyDir);
				}
				
				if ($proxyNamespace = config('objectquel.proxy_namespace')) {
					$config->setProxyNamespace($proxyNamespace);
				}
				
				// Set metadata cache configuration
				if (config('objectquel.use_metadata_cache') !== null) {
					$config->setUseMetadataCache(config('objectquel.use_metadata_cache'));
				}
				
				if ($metadataCachePath = config('objectquel.metadata_cache_path')) {
					$config->setMetadataCachePath($metadataCachePath);
				}
				
				// Set migrations path
				if ($migrationsPath = config('objectquel.migrations_path')) {
					$config->setMigrationsPath($migrationsPath);
				}
				
				// Set default window size for pagination
				if ($windowSize = config('objectquel.default_window_size')) {
					$config->setDefaultWindowSize($windowSize);
				}
				
				return new EntityManager($config);
			});
		}
		
		/**
		 * Bootstrap services.
		 * @return void
		 */
		public function boot() {
			// Publish configuration
			$this->publishes([
				__DIR__ . '/../config/objectquel.php' => config_path('objectquel.php'),
			], 'objectquel-config');
		}
	}