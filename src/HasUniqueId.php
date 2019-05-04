<?php

namespace Chistel\CodeigniterUniqueid;

trait HasUniqueId
{
	protected $uniqueIdOptions;

	/**
	* Get the options for generating the uniqueId.
	*/
	abstract public function getUniqueIdOptions(): UniqueIdOptions;


	/**
	* Handle adding UniqueId on model creation.
	*/
	protected function generateUniqueId($data)
	{
		$this->uniqueIdOptions = $this->getUniqueIdOptions();

		$data = $this->addUniqueId($data);

		return $data;
	}

	/**
	* Add the UniqueId to the model.
	*/
	protected function addUniqueId($data)
	{
		$this->guardAgainstInvalidUniqueIdOptions();

		$uniqueId = $this->makeUniqueIdUnique();

		$uniqueIdField = $this->uniqueIdOptions->uniqueIdField;

		$data['data'][$uniqueIdField] = $uniqueId;

		return $data;

	}

	/**
	* Make the given UniqueId unique.
	*/
	protected function makeUniqueIdUnique(): string
	{
		helper('text');

		do {
	      $uniqueId = random_string('alnum',$this->uniqueIdOptions->maximumLength);
	      $checkCode = $this->where($this->uniqueIdOptions->uniqueIdField, $uniqueId)->countAllResults();
	   } while($checkCode > 0);

		return $uniqueId;
	}

	/**
	* This function will throw an exception when any of the options is missing or invalid.
	*/
	protected function guardAgainstInvalidUniqueIdOptions()
	{
		if (! strlen($this->uniqueIdOptions->uniqueIdField)) {
		   throw InvalidOption::missingUniqueIdField();
		}

		if ($this->uniqueIdOptions->maximumLength <= 0) {
		   throw InvalidOption::invalidMaximumLength();
		}
	}
}

