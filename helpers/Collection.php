<?php

namespace kingston\icarus\helpers;

use IteratorAggregate;
use Traversable;
use ArrayIterator;

class Collection implements IteratorAggregate {
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function countIf($prop, $value)
    {

        $result = array();
        foreach($this->items as $item){
            if($item->$prop === $value){
                array_push($result, $item);
            }
        }

        return count($result);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function toJson(){
        return json_encode($this->items);
    }
}