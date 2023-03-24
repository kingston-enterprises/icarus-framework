Application
===========

`kingston\icarus\Application`
`class Application`

Main framework  backbone everything starts, ends or goes through here.
  
Application represents the lifecyle of the interaction with the app by the user
every major class is connected to this one.

example : starting the application - You want to do this in you `index.php`
    
.. code-block:: console
    $config = [ 'database' => [
        'dsn' => 'database_name',
        'user' => 'database_user',
        'password' => 'database_password',
        ]
    ];

    $app = new Application(dirname(__DIR__), $config);
    $app->run();

In this example all you have to do is define your config variables these are then passed along with the application root directory name to Application, and lastly you run the application.

Properties
==========
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


Methods
=======
