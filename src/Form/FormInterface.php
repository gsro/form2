<?php
/**
 * User: @gabidj
 * Date: 10/26/2017
 * Time: 11:38 PM
 */

namespace GSRO\DotKernel\Form2\Form;


interface FormInterface
{
    /**
     * @return array[FieldsetInterface]
     */
    public function getFieldsetList() : array;
}
