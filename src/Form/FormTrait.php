<?php
/**
 * User: @gabidj
 * Date: 10/26/2017
 * Time: 11:38 PM
 */

namespace GSRO\DotKernel\Form2\Form;

trait FormTrait
{
    /**
     * @var array[FieldsetInterface]
     */
    protected $fieldsetList;
    
    /**
     * @return array
     */
    public function getFieldsetList(): array
    {
        return $this->fieldsetList;
    }
    
    /**
     * @param array $fieldsetList
     * @return FormTrait
     */
    public function setFieldsetList(array $fieldsetList): FormTrait
    {
        $this->fieldsetList = $fieldsetList;
        return $this;
    }
}
