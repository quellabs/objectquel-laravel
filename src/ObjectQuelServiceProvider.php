<?php
	
	namespace Quellabs\ObjectQuel\Laravel;
	
	use Illuminate\Support\ServiceProvider;
	use Quellabs\ObjectQuel\EntityManager\EntityManager;
	use Quellabs\ObjectQuel\Kernel\Kernel;
	
	class ObjectQuelServiceProvider extends ServiceProvider
	{
		/**
		 * Register services.
		 *
		 * @return void
		 */
		public function register()
		{
			$this->mergeConfigFrom(
				__DIR__.'/../config/objectquel.php', 'objectquel'
			);
			
			// Register the EntityManager in the service container
			$this->app->singleton(EntityManager::class, function ($app) {
				// Create and configure kernel with Laravel's configuration
				$kernel = new Kernel(config('objectquel'));
				
				return new EntityManager($kernel);
			});
		}
		
		/**
		 * Bootstrap services.
		 *
		 * @return void
		 */
		public function boot()
		{
			// Publish configuration
			$this->publishes([
				__DIR__.'/../config/objectquel.php' => config_path('objectquel.php'),
			], 'objectquel-config');
		}
	}