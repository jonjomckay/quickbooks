<?php

namespace ActiveCollab\Quickbooks\Data;

use ActiveCollab\Quickbooks\Data\Entity;

class BatchResponse implements \IteratorAggregate, \Countable, \JsonSerializable
{
    /**
     * Collection of entities
     * 
     * @var array
     */
    protected $entities = [];

    /**
     * Construct query response
     * 
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $rows) {
            $this->entities[] = new BatchEntity($rows[0], $rows['bId']);
        }
    }

    /**
     * Return iterator
     * 
     * @return ArrayIterator
     */
    public function getIterator() 
    {
        return new \ArrayIterator($this->entities);
    }

    /**
     * Return number of object in collection
     * 
     * @return int
     */
    public function count()
    {
        return count($this->entities);
    }

    /**
     * Return serialize data
     * 
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->entities;
    }
}