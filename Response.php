<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus;

/**
 * controlling class for all system responses 
 * 
 */
class Response
{
    /**
     * set HTTP response code
     *
     * @param integer $code
     * @return void
     */
    public function statusCode(int $code) : void
    {
        http_response_code($code);
    }

    /**
     * redirect to url
     *
     * @param string $url
     * @return void
     */
    public function redirect($url) : void
    {
        header("Location: $url");
    }
}
