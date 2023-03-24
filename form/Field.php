<?php
/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\exception
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\form;

use kingston\icarus\Model;

/**
 * Field Class 
 * 
 * @extends \BaseField
 */
class Field extends BaseField
{
    /**
     * text type
     * @var string
     */
    const TYPE_TEXT = 'text';

    /**
     * password type
     * @var string
     */
    const TYPE_PASSWORD = 'password';

    /**
     * datetime-local type
     * @var string
     */
    const TYPE_DATETIME = 'datetime-local';
    
    /** start parent class instance */
    public function __construct(Model $model, string $attribute, $placeholder)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute, $placeholder);
    }

    /** render input */
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

    /**
     * render password field
     *
     * @return Field
     */
    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    /**
     * render datetimefield
     *
     * @return Field
     */
    public function dateTimeField()
    {
        $this->type = self::TYPE_DATETIME;
        return $this;
    }

}
