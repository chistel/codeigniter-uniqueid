# codeigniter-uniqueid is same as [laravel uniqueid](https://github.com/chistel/laravel-uniqueid), but for codeigniter4.

the trait is to enable you use unique id for you codeigniter route. 
unfortunately, codeigniter4 does not use a routekey at the moment. 
so you would not be able to pass the unique column/value via model

## Installation

You can install the package via composer:
``` bash
composer require chistel/codeigniter-uniqueid
```

## Usage

Your Eloquent models should use the `Chistel\CodeigniterUniqueId\HasUniqueId` trait and the `Chistel\CodeigniterUniqueId\UniqueIdOptions` class.

The trait contains an abstract method `getUniqueIdOptions()` that you must implement yourself. 

Here's an example of how to implement the trait:

```php
<?php

namespace App;

use CodeIgniter\Model;
use Chistel\CodeigniterUniqueId\HasUniqueId;
use Chistel\CodeigniterUniqueId\UniqueIdOptions;

class UserModel extends Model
{
   use HasUniqueId;
  	
  	protected $beforeInsert = [
		'generateUniqueId' // this is ben called from the trait
	];
	/**
	* Get the options for generating model uniqueId.
	*/
	public function getUniqueIdOptions() : UniqueIdOptions
	{
	  	return UniqueIdOptions::create()
	   	->saveUniqueIdTo('user_unique_id') // this is the unique key column 
	      	->uniqueIdShouldBeNoLongerThan(8);
	}
}
```
the uniqueid is only available on model creating.
