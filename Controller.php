<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace kingston\icarus;

/**
 * Main interface between models and views
 */
class Controller {

    /**
     * view layout file name
     *
     * @var string
     */
    public string $layout = 'main';

    /** @deprecated v23.03.22
     * controller action
     * 
     * @var string
     */
    public string $action = '';


    /**
     * set controller layout
     *
     * @param string    $layout layout file name
     * @return void
     */
    public function setLayout($layout) : void
    {
        $this->layout = $layout;
    }

    /**
     * render user view
     *
     * @param string $view      view file path 
     * @param array $params     parameters to pass to view
     * @return string
     */
    public function render($view, $params = []) : string
    {
        return Application::$app->router->renderView($view, $params);
    }

}
