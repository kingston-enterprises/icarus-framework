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
 * DataList class
 * @extends \BaseField
 */
class DataList extends BaseField
{

    /**
     * datalist options
     *
     * @var array
     */
    public $options = [];

    /**
     * default option
     * @var string
     */
    public $default = '';

    public function __construct(Model $model, string $attribute, array $options)
    {
        $this->options = $options;
        parent::__construct($model, $attribute);
    }

    public function makeOptions(array $options)
    {
        $optionHtml = '';
        foreach ($options as $option) {
            $optionHtml = $optionHtml . '<option value=' . $option . '>' . $option . '</option>';
        }
        return $optionHtml;
    }

    /** render DataList */
    public function renderInput()
    {
        return sprintf(
            '<select class=" %s py-3 px-4 pr-9 block w-full border-gray-200
            rounded-md text-sm focus:border-blue-500 focus:ring-blue-500" name="%s">
        %s
        </select>',
        $this->model->hasError($this->attribute) ? ' text-red-500 hover:text-red-700' : '',
            $this->attribute,
            $this->makeOptions($this->options)
        );
    }
}
