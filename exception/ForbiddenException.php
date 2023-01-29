<?php
/** created by : kingston-5 @ 17/01/23 **/

namespace kingston\icarus\exception;


use kingston\icarus\Application;

/**
 * Class ForbiddenException
 */
class ForbiddenException extends \Exception
{
    protected $message = 'Please Log In to To Perfomr that action';
    protected $code = 403;
}
