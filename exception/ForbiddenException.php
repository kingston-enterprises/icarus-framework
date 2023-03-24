<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\exception
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\exception;


/**
 * Class ForbiddenException
 */
class ForbiddenException extends \Exception
{
    protected $message = 'Please Log In to To Perfomr that action';
    protected $code = 403;
}
