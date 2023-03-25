<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\form
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\form;

use kingston\icarus\Model;

/**
 * TextArea class
 * @extends \BaseField
 */
class TextArea extends BaseField
{
    /**
     * text type
     * @var
     */
    const TYPE_TEXT = 'text';

    /**
     * text area rows
     *
     * @var integer
     */
    public int $rows = 5;

    public function __construct(Model $model, string $attribute, $placeholder, $rows)
    {
        $this->type = self::TYPE_TEXT;
        $this->rows = $rows;
        parent::__construct($model, $attribute, $placeholder);
    }

    /** render TextArea */
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
