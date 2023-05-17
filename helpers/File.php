<?php

/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\helpers
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\helpers;


/**
 * class Collection is an easy wrapper for working with arrays of data
 * @implements \IteratorAggregate
 */
class File {
    public $name = '';
    public $path = '';
    public $type = '';
    public $size = '';
    public $error = '';
    public $tmp_name = '';

    public function __construct($file)
    {
        $this->name = $file['name'];
        $this->path = $file['full_path'];
        $this->type = $file['type'];
        $this->size = $file['size'];
        $this->error = $file['error'];
        $this->tmp_name = $file['tmp_name'];
    }

    /*
    * get Specific items property
    *
    * @return string
    */
   public function getProp($prop): string
   {
       return $this->$prop;
   }

   public function maxSize($max)
   {
    
   }
}

