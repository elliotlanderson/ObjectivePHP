<?php

namespace ObjectivePHP\Collection;

class Collection implements \arrayaccess, \IteratorAggregate
{
	/** 
	* @var array
	* This is the stored array that we return
	*/ 

	protected $array = array();

	public function __construct($var)
	{
		if (is_string($var)) {
			$this->array[] = $var;
		}
		elseif (is_array($var)) {
			return $this->array = $var;
		}
	}

	public function __tostring()
	{
		return json_encode($this->array);
	}

	public function __get($val)
	{
		if (empty($this->$val)) {
			return $this->$val();
		} else {
			return $val;
		}
	}

	public function __invoke($data)
	{
		return $this->array[$data];
	}

	public function offsetSet($offset, $value)
	{
		if (is_null($offset)) {
			$this->array[] = $value;
		} else {
			$this->array[$offset] = $value;
		}
	}

	public function offsetExists($offset) {
		return isset($this->array[$offset]);
	}

	public function offsetUnset($offset) {
		unset($this->array[$offset]);
	}

	public function offsetGet($offset) {
		return isset($this->array[$offset]) ? $this->array[$offset] : null;
	}

	public function getIterator() {
		return new \ArrayIterator($this->array);
	}


	/**
	* length() 
	* This method will return the size of the array
	* @return integer
	*/

	public function length()
	{
		return sizeof($this->array);
	}

	/**
	* sort()
	* This method will sort the array
	* @param 1 -> optional flag for sortingtype in PHPs sort() function
	*/

	public function sort($sortingtype = null)
	{
		sort($this->array, $sortingtype);
	}

	public function add($value)
	{
		if (is_array($value)) {
			$this->array = array_merge($value, $this->array);
		} elseif (is_string($value)) {
			$this->array[] = $value;
		}

		return $this;
	}
}