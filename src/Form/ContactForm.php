<?php
/**
 * User: @gabidj
 * Date: 10/26/2017
 * Time: 11:38 PM
 */

namespace GSRO\DotKernel\Form2\Form;

use GSRO\DotKernel\Form2\Fieldset\PersonalData;
use GSRO\DotKernel\Form2\Fieldset\SimpleMessage;

class ContactForm implements FormInterface
{
    use FormTrait;
    
    public function __construct($fieldsetList = null)
    {
        $this->fieldsetList = $fieldsetList ?? [
            new PersonalData(),
            new SimpleMessage(),
        ];
    }
}
