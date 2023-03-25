<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus;

use kingston\icarus\exception\NotFoundException;

/**
 * Custom URL router
 */
class Router {

    /**
     * the Request instance
     *
     * @var Request
     */
    private Request $request;

    /**
     * the response instance
     *
     * @var Response
     */
    private Response $response;

    /**
     * request route map
     *
     * @var array
     */
    private array $routeMap = [];

    /**
     * instantiate request an response
     *
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * set get method URL and callback function
     *
     * @param string $url
     * @param array $callback
     * @return void
     */
    public function get(string $url, $callback) : void
    {
        $this->routeMap['get'][$url] = $callback;
    }

    /**
     * set post method URL and callback function
     *
     * @param string $url
     * @param array $callback
     * @return void
     */
    public function post(string $url, $callback) : void
    {
        $this->routeMap['post'][$url] = $callback;
    }

    /**
     * @return array
     */
    public function getRouteMap($method) : array
    {
        return $this->routeMap[$method] ?? [];
    }

    /**
     * get route callback funtion
     *
     * @return string|bool
     */
    public function getCallback() : string|bool
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        // Trim slashes
        $url = trim($url, '/');

        // Get all routes for current request method
        $routes = $this->getRouteMap($method);

        $routeParams = false;

        // Start iterating registed routes
        foreach ($routes as $route => $callback) {
            // Trim slashes
            $route = trim($route, '/');
            $routeNames = [];

            if (!$route) {
                continue;
            }

            // Find all route names from route and save in $routeNames
            if (preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches)) {
                $routeNames = $matches[1];
            }

            // Convert route name into regex pattern
            $routeRegex = "@^" . preg_replace_callback('/\{\w+(:([^}]+))?}/', fn($m) => isset($m[2]) ? "({$m[2]})" : '(\w+)', $route) . "$@";

            // Test and match current route against $routeRegex
            if (preg_match_all($routeRegex, $url, $valueMatches)) {
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                $routeParams = array_combine($routeNames, $values);

                $this->request->setRouteParams($routeParams);
                return $callback;
            }
        }

        return false;
    }

    /**
     * call route callback function
     *
     * @return mixed
     */
    public function resolve() : mixed
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        $callback = $this->routeMap[$method][$url] ?? false;
        if (!$callback) {

            $callback = $this->getCallback();

            if ($callback === false) {
                throw new NotFoundException();
            }
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            /**
             * @var $controller \kingstonenterprises\app\Controller
             */
            $controller = new $callback[0];
            $controller->action = $callback[1];
            Application::$app->controller = $controller;
            /*$middlewares = $controller->getMiddlewares();
            foreach ($middlewares as $middleware) {
                $middleware->execute();
            }*/
            $callback[0] = $controller;
        }
        return call_user_func($callback, $this->request, $this->response);
    }

    /** 
     * render Route full view
     * 
     * @param string $view
     * @param array $params
     * @return string
    */
    public function renderView($view, $params = []) : string
    {
        return Application::$app->view->renderView($view, $params);
    }

    /**
     * render route view content only
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    public function renderViewOnly($view, $params = []) : string
    {
        return Application::$app->view->renderViewOnly($view, $params);
    }
}
?>
