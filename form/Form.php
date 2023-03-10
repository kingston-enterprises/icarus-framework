<?php
/** created by : kingston-5 @ 17/01/23 **/

namespace kingston\icarus\form;

use kingston\icarus\Model;

class Form
{
    public static function begin($action, $method, $options = [])
    {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\"$value\"";
        }
        echo sprintf('<form action="%s" method="%s" %s class="max-w-lg mx-auto">', $action, $method, implode(" ", $attributes));
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute, $placeholder = null)
    {
        return new Field($model, $attribute, $placeholder);
    }
    
    public function textArea(Model $model, $attribute)
    {
        return new TextArea($model, $attribute);
    }
}
