# Laravel ObjectQuel Integration

This package provides a Laravel integration for the ObjectQuel ORM system.

## Installation

You can install the package via composer:

```bash
composer require quellabs/laravel-objectquel
```

The package will automatically register its service provider.

## Configuration

Publish the configuration file using:

```bash
php artisan vendor:publish --provider="Quellabs\ObjectQuel\Laravel\ObjectQuelServiceProvider" --tag="objectquel-config"
```

This will create a `config/objectquel.php` file where you can configure your database connection, entity paths, and caching options.

## Usage

Once installed, you can use the `ObjectQuel` facade to interact with your entities:

```php
use Quellabs\ObjectQuel\Laravel\ObjectQuel;

// Finding an entity
$user = ObjectQuel::find(User::class, 1);

// Creating a new entity
$product = new Product();
$product->setName('New Product');
$product->setPrice(19.99);

// Persisting the entity
ObjectQuel::persist($product);
ObjectQuel::flush();

// Executing a query
$results = ObjectQuel::executeQuery('MATCH (u:User) WHERE u.id = :id RETURN u', ['id' => 1]);

// Getting all results
$users = ObjectQuel::getAll('MATCH (u:User) RETURN u');

// Removing an entity
ObjectQuel::remove($user);
ObjectQuel::flush();
```

## Available Methods

The ObjectQuel facade provides the following methods:

- `persist(object &$entity)`: Add an entity to the entity manager for persistence
- `flush(mixed $entity = null)`: Save all changes to the database
- `detach(object $entity)`: Detach an entity from the entity manager
- `executeQuery(string $query, array $parameters = [])`: Execute an ObjectQuel query
- `getAll(string $query, array $parameters = [])`: Get all results from a query
- `getCol(string $query, array $parameters = [])`: Get a column of results from a query
- `findBy(string $entityType, mixed $primaryKey)`: Find entities by primary key
- `find(string $entityType, mixed $primaryKey)`: Find a single entity by primary key
- `remove(object $entity)`: Mark an entity for removal
- `getValidationRules(object $entity)`: Get validation rules for an entity
- `entityExists(string $entityName)`: Check if an entity exists

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.