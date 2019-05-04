<?php

namespace Chistel\CodeigniterUniqueid;

use Exception;

class InvalidOption extends Exception
{
	public static function missingUniqueIdField()
	{
	  	return new static('Could not determine in which field the UniqueId should be saved');
	}

	public static function invalidMaximumLength()
	{
	  	return new static('Maximum length should be greater than zero');
	}
}
