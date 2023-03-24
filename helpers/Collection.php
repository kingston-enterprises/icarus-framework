<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\exception
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\helpers;

use IteratorAggregate;
use Traversable;
use ArrayIterator;

/**
 * class Collection is an easy wrapper for working with arrays of data
 * @implements \IteratorAggregate
 */
class Collection implements IteratorAggregate {
    /**
     * items in collection
     *
     * @var array
     */
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function get() : array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return count($this->items);
    }

    /**
     * @return int
     */
    public function countIf($prop, $value) : int
    {

        $result = array();
        foreach($this->items as $item){
            if($item->$prop === $value){
                array_push($result, $item);
            }
        }

        return count($result);
    }

    /**
     * @return \Traversable
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    /**
     * @return string|false
     */
    public function toJson() : string|false
    {
        return json_encode($this->items);
    }
}