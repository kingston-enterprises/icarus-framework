<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\exception
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\exception;


/**
 * Class NotFoundException
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}
