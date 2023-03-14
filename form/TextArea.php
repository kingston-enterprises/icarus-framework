<?php
/** created by : kingston-5 @ 17/01/23 **/

namespace kingston\icarus\form;

use kingston\icarus\Model;

class TextArea extends BaseField
{
    const TYPE_TEXT = 'text';
    public int $rows = 5;

    public function __construct(Model $model, string $attribute, $placeholder, $rows)
    {
        $this->type = self::TYPE_TEXT;
        $this->rows = $rows;
        parent::__construct($model, $attribute, $placeholder);
    }

    public function renderInput()
    {
        return sprintf('<textarea class="form-control %s block w-full px-3 py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            "rows="%s" placeholder="%s" name="%s" value="%s"></textarea>',
            
            $this->model->hasError($this->attribute) ? ' text-red-500 hover:text-red-700' : '',
            $this->rows,       
            $this->placeholder ?? $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }

}
