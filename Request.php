<?php

/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus;

/**
 * Controlling class for all system http requests.
 */
class Request
{
    /**
     * http route parameters
     *
     * @var array
     */
    private array $routeParams = [];

    /**
     * get server request method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * get server request URI
     *
     * @return string
     */
    public function getUrl(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    /**
     * confirm http method is GET
     *
     * @return boolean
     */
    public function isGet(): bool
    {
        return $this->getMethod() === 'get';
    }

    /**
     * confirm http method is POST
     *
     * @return boolean
     */
    public function isPost(): bool
    {
        return $this->getMethod() === 'post';
    }

    /**
     * get http request $_GET or $_POST data
     *
     * @return array
     */
    public function getBody(): array
    {
        $data = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $data;
    }

    /**
     * get http request $_FILES data
     *
     * @return array
     */
    public function getFiles($fileName): array
    {
        foreach ($_FILES as $key => $value) {
            if ($fileName == $key) {
                return $_FILES[$fileName];
            }
        }
        return false;
    }

    /**
     * set http route parameters
     * 
     * @param $params
     * @return self
     */
    public function setRouteParams($params): self
    {
        $this->routeParams = $params;
        return $this;
    }

    /** 
     * get http route parameters
     * 
     * @return array
     */
    public function getRouteParams(): array
    {
        return $this->routeParams;
    }

    /**
     * get a single http route parameter
     *
     * @param string    $param route parameter name
     * @param null      $default default route paramter null
     * @return string
     */
    public function getRouteParam($param, $default = null): string
    {
        return $this->routeParams[$param] ?? $default;
    }
}
