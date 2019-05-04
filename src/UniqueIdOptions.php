<?php

namespace Chistel\CodeigniterUniqueid;

class UniqueIdOptions
{
	/** @var string */
	public $uniqueIdField;

	/** @var int */
	public $maximumLength = 10;


	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public static function create(): self
	{
	  	return new static();
	}

	/**
	 * [saveUniqueIdTo description]
	 * @param  string $fieldName [description]
	 * @return [type]            [description]
	 */
	public function saveUniqueIdTo(string $fieldName): self
	{
	  	$this->uniqueIdField = $fieldName;

	  	return $this;
	}

	/**
	 * [uniqueIdShouldBeNoLongerThan description]
	 * @param  int    $maximumLength [description]
	 * @return [type]                [description]
	 */
	public function uniqueIdShouldBeNoLongerThan(int $maximumLength): self
	{
	  	$this->maximumLength = $maximumLength;

	  	return $this;
	}
}
