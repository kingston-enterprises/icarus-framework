<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus;

/**
 * View Render class
 */
class View
{
    /**
     * view title
     *
     * @var string
     */
    public string $title = '';

    /** 
     * render Route full view
     * 
     * @param string $view
     * @param array $params
     * @return string
    */
    public function renderView($view, array $params) : string
    {
        $layoutName = Application::$app->layout;
        if (Application::$app->controller) {
            $layoutName = Application::$app->controller->layout;
        }
        $viewContent = $this->renderViewOnly($view, $params);
        ob_start();
        include_once Application::$ROOT_DIR."/app/views/layouts/$layoutName.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * render route view content
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    public function renderViewOnly($view, array $params) : string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/app/views/$view.php";
        return ob_get_clean();
    }
}
