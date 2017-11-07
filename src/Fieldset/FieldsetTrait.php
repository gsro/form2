<?php
/**
 * User: @gabidj
 * Date: 10/27/2017
 * Time: 12:05 AM
 */
namespace GSRO\DotKernel\Form2\Fieldset;

trait FieldsetTrait
{
    /**
     * @var array
     */
    protected $options;
    
    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
    
    /**
     * @param array $options
     * @return PersonalData
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }
}
