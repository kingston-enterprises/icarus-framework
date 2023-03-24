<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus;

/**
 * Controlling class for all system session and related data.
 */
class Session
{
    /**
     * session flash message key
     * @var string
     */
    protected const FLASH_KEY = 'flash_messages';

    /**
     * start new session and mark old flash messages to be removed
     * 
     * @return void
     */
    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['remove'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    /**
     * set new flash message
     *
     * @param string $key
     * @param string $message
     * @return void
     */
    public function setFlash($key, $message) : void
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    /**
     * get flash message 
     *
     * @param string $key
     * @return string|bool
     */
    public function getFlash($key) : string|bool
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    /**
     * set session variable
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function set($key, $value) : void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * get session variable
     *
     * @param string $key
     * @return string|bool
     */
    public function get($key) : string|bool
    {
        return $_SESSION[$key] ?? false;
    }

    /**
     * unset session variable
     *
     * @param string $key
     * @return void
     */
    public function remove($key) : void
    {
        unset($_SESSION[$key]);
    }

    /**
     * destroy falash messages in instance
     */
    public function __destruct()
    {
        $this->removeFlashMessages();
    }

    /**
     * remove all flash messages
     *
     * @return void
     */
    private function removeFlashMessages() : void
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => $flashMessage) {
            if ($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }
}
