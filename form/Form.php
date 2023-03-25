<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\forms
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\form;

use kingston\icarus\Model;

/**
 * Form class
 */
class Form
{
    /**
     * start form output
     *
     * @param string $action
     * @param string $method
     * @param array $options
     * @return Form
     */
    public static function begin($action, $method, $options = [])
    {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\"$value\"";
        }
        echo sprintf('<form action="%s" method="%s" %s class="max-w-lg mx-auto">', $action, $method, implode(" ", $attributes));
        return new Form();
    }

    /**
     * end form output
     *
     * @return void
     */
    public static function end() : void
    {
        echo '</form>';
    }

    /**
     * start field instance
     *
     * @param Model $model
     * @param string $attribute
     * @param string $placeholder
     * @return \Field
     */
    public function field(Model $model, $attribute, $placeholder = null)
    {
        return new Field($model, $attribute, $placeholder);
    }
    
    /**
     * start textArea instance
     *
     * @param Model $model
     * @param string $attribute
     * @param string $placeholder
     * @param int $rows
     * @return \TextArea
     */
    public function textArea(Model $model, $attribute, $placeholder = null, $rows)
    {
        return new TextArea($model, $attribute, $placeholder, $rows);
    }
}
