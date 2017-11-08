<?php
/**
 * User: @gabidj
 * Date: 11/09/2017
 * Time: 01:38 AM
 */

namespace GSRO\DotKernel\Form2\Form;

use GSRO\DotKernel\Form2\Fieldset\PersonalData;
use GSRO\DotKernel\Form2\Fieldset\SimpleMessage;

class SimpleForm implements FormInterface
{
    use FormTrait;
    
    public function __construct($fieldsetList = null)
    {
        $this->fieldsetList = $fieldsetList ?? [];
    }
}
