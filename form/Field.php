<?php
/** created by : kingston-5 @ 17/01/23 **/

namespace kingston\icarus\form;

use kingston\icarus\Model;

class Field extends BaseField
{
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_DATETIME = 'datetime-local';
    
    public function __construct(Model $model, string $attribute, $placeholder)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute, $placeholder);
    }

    public function renderInput()
    {
        return sprintf('<input type="%s" class="form-control %s block w-full px-3 py-1.5 text-base font-bold text-orange-700 bg-white 
        bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 
        focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="%s" name="%s" value="%s"/>',
            $this->type,
            $this->model->hasError($this->attribute) ? ' text-red-500 hover:text-red-700' : '',
            $this->placeholder ?? $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function dateTimeField()
    {
        $this->type = self::TYPE_DATETIME;
        return $this;
    }

}
