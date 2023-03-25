<?php

/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus\form
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus\form;


use kingston\icarus\Model;
// TODO: Unit Test /form classes

/**
 * BaseField Class
 * @abstract
 */
abstract class BaseField
{

    /**
     * the Model instance
     *
     * @var Model
     */
    public Model $model;

    /**
     * field attribute
     *
     * @var string
     */
    public string $attribute;

    /**
     * field placeholder
     *
     * @var string|null
     */
    public ?string $placeholder;

    /**
     * field type
     *
     * @var string
     */
    public string $type;

    /**  
     * start instances
     */
    public function __construct(Model $model, string $attribute, string $placeholder = null)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->placeholder = $placeholder;
    }

    /**
     * print out basefield HTML
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '<div class="mb-6">
				        %s
				        <div class="m-2 p-2 inline-block font-medium text-xs leading-tight">
				            <p class="text-red-500 hover:text-red-700"> %s</p>
				        </div>
                  </div>',
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }

    /**
     * render input field
     * @abstract
     * @return void
     */
    abstract public function renderInput();
}
