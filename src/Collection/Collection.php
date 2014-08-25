<?php

namespace ObjectivePHP\Collection;

class Collection implements \arrayaccess, \IteratorAggregate
{
	/** 
	* @var array
	* This is the stored array that we return
	*/ 

	protected $array = array();

	public function __construct($var = null)
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

	/**
	* add()   
	* This method will add the paramter to your array 
	* @param 1 -> string or array
	* @return $this
	*/
	public function add($value)
	{
		if (is_array($value)) {
			$this->array = array_merge($value, $this->array);
		} elseif (is_string($value)) {
			$this->array[] = $value;
		}

		return $this;
	}

	/**
	* getArray() 
	* return the raw array as a data type array
	* @return array
	*/

	public function getArray()
	{
		return $this->array;
	}

	/**
	* first()
	* This method will grab the first item in the array
	* @return type of whatever first element is. False if empty
	*/

	public function first()
	{
		return reset($this->array);
	}

	/**
	* last()
	* This method will grab the last item in the array
	* @return type of whatever last element is. False if empty
	*/

	public function last()
	{
		return end($this->array);
	}

	/**
	* toObject()
	* this method will typecast the array to an object for you
	* @return instance of stdObj
	*/

	public function toObject()
	{
		return (Object)$this->array;
	}

	/**
	* values() 
	* This method will return an array of all the values 
	* @return array
	*/

	public function values()
	{
		return array_values($this->array);
	}

	/**
	* reverse() 
	* Reverses the array
	* @return $this
	*/

	public function reverse()
	{
		$this->array = array_reverse($this->array);

		return $this;
	}

	/**
	* remove()
	* Removes an item from the array
	* @param 1 -> String/Int of index to remove 
	* separate by a period to remove a multidimensional value
	* @return $this
	*/

	public function remove($index) 
	{
		unset($this->array[$index]);
	}

	public function dump()
	{
		var_dump($this->array);

		return $this;
	}

	public function clear()
	{
		$this->array = array();

		return $this;
	}
}