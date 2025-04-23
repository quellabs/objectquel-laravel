<?php
	
	namespace Quellabs\ObjectQuel\Laravel;
	
	use Illuminate\Support\Facades\Facade;
	use Quellabs\ObjectQuel\EntityManager\EntityManager;
	use Quellabs\ObjectQuel\ObjectQuel\QuelResult;
	
	/**
	 * @method static bool persist(object &$entity)
	 * @method static void flush(mixed $entity = null)
	 * @method static void detach(object $entity)
	 * @method static QuelResult|null executeQuery(string $query, array $parameters = [])
	 * @method static array getAll(string $query, array $parameters = [])
	 * @method static array getCol(string $query, array $parameters = [])
	 * @method static array findBy(string $entityType, mixed $primaryKey)
	 * @method static object|null find(string $entityType, mixed $primaryKey)
	 * @method static void remove(object $entity)
	 * @method static array getValidationRules(object $entity)
	 * @method static bool entityExists(string $entityName)
	 *
	 * @see \Quellabs\ObjectQuel\EntityManager\EntityManager
	 */
	class ObjectQuel extends Facade {
		
		/**
		 * Get the registered name of the component.
		 * @return string
		 */
		protected static function getFacadeAccessor() {
			return EntityManager::class;
		}
	}