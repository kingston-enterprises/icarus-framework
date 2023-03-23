<?php

/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace kingston\icarus;

/**
 * Main framework  backbone everything starts, ends or goes through here.
 * 
 * Application represents the lifecyle of the interaction with the app by the user
 * every major class is connected to this one.
 * 
 *      
 *      $config = [ 'database' => [
 *           'dsn' => 'database_name',
 *           'user' => 'database_user',
 *           'password' => 'database_password',
 *          ]
 *      ];
 *
 *      $app = new Application(dirname(__DIR__), $config);
 *      $app->run();
 * 
 * In this example all you have to do is define your config variables these are then passed
 * along with the application root directory name to Application, and lastly you run the application.
 */
class Application
{

    /**
     * Before application request trigger
     *
     * @var string
     */
    const EVENT_BEFORE_REQUEST = 'beforeRequest';

    /** After application request trigger
     *
     * @var string
     */
    const EVENT_AFTER_REQUEST = 'afterRequest';

    /**
     * Application event listeners
     *
     * @var array
     */
    protected array $eventListeners = [];

    /**
     * Application root directory
     *
     * @var string
     */
    public static string $ROOT_DIR;

    /**
     * Users` PHP to web server inter face
     *
     * @var string|bool
     */
    public static string $api;

    /** @deprecated v23.03.22
     * Application User class instance
     * 
     * @var string
     */
    public string $userClass;

    /**
     * The application instance.
     *
     * @var \Application
     */
    public static Application $app;

    /**
     * The request instance.
     *
     * @var \Request
     */
    public Request $request;

    /**
     * The router instance.
     *
     * @var \Router
     */
    public Router $router;

    /**
     * The response instance.
     *
     * @var \Response
     */
    public Response $response;

    /**
     * The view instance.
     *
     * @var \View
     */
    public View $view;

    /**
     * The controller instance.
     *
     * @var \Controller
     */
    public ?Controller $controller = null;

    /**
     * The database instance.
     *
     * @var \Database
     */
    public Database $db;

    /**
     * The session instance.
     *
     * @var \Session
     */
    public Session $session;

    /**
     * The default view layout
     *
     * @var string
     */
    public string $layout = 'main';

    /**
     * Bootstrap application
     *
     * @param string    $rootDir application root directory
     * @param string    $config important config variables
     */
    public function __construct($rootDir, $config)
    {

        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        self::$api = php_sapi_name();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->db = new Database($config['db']);
        $this->session = new Session();

        /** @deprecated v23.03.22 */
        $this->userClass = $config['userClass'];
    }

    /**
     * try to show the requested view
     * @return void
     * 
     */
    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    /**
     * Trigger an event`s callback
     *
     * @param string $eventName
     * @return void
     */
    public function triggerEvent($eventName): void
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }

    /** 
     * assign callback function to event listener 
     * @return void
     * */
    public function on($eventName, $callback): void
    {
        $this->eventListeners[$eventName][] = $callback;
    }

    /**
     * Check if user session exists
     *
     * @return boolean
     */
    public static function isGuest(): bool
    {
        return !self::$app->session->get('user');
    }
}
