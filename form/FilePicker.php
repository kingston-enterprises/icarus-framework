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
 * FilePicker class
 * @extends \BaseField
 */
class FilePicker extends BaseField
{
    /**
     * file type accept
     * @var
     */
    public string $accept = '';

    public function __construct(Model $model, string $attribute, $accept)
    {
        $this->accept = $accept;
        parent::__construct($model, $attribute);
    }

    /** render FilePicker */
    public function renderInput()
    {
        return sprintf('<input class="%s" name="%s" type="file" id="%s" accept="%s" />',
            
            $this->model->hasError($this->attribute) ? ' text-red-500 hover:text-red-700' : '',
            $this->attribute,
            $this->attribute,
            $this->accept
        );
    }

}
