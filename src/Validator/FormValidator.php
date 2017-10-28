<?php
/**
 * User: @gabidj
 * Date: 10/26/2017
 * Time: 11:38 PM
 */

namespace GSRO\DotKernel\Form2\Validator;

use GSRO\DotKernel\Form2\Fieldset\Message;
use GSRO\DotKernel\Form2\Fieldset\PersonalData;
use GSRO\DotKernel\Form2\Form\FormInterface;
use Zend\Filter\FilterInterface;
use Dot_Filter;

class FormValidator
{
    /**
     * @var FormInterface
     */
    protected $form;
    
    /**
     * @var $rray
     */
    protected $data = [];
    
    /**
     * @var array
     */
    protected $error = [];
    
    /**
     * @return FormInterface
     */
    public function getForm(): FormInterface
    {
        return $this->form;
    }
    
    /**
     * @param FormInterface $form
     * @return FormValidator
     */
    public function setForm(FormInterface $form): FormValidator
    {
        $this->form = $form;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * @param mixed $data
     * @return FormValidator
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    
    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }
    
    /**
     * @param array $error
     * @return FormValidator
     */
    public function setError(array $error): FormValidator
    {
        $this->error = $error;
        return $this;
    }
    
    public function __construct(FormInterface $form)
    {
        $this->form = $form;
    }
    
    /**
     * Filter caller
     *
     * @param array $filterList
     * @param $value
     * @return mixed
     */
    public function callFilter(array $filterList, $value)
    {
        foreach ($filterList as $filter) {
            $filterClass = $filter['name'];
            $filterOptions = $filter['options'];
            $filter = new $filterClass($filterOptions);
            $value = $filter->filter($value);
        }
        return $value;
    }
    
    public function callValidator(array $validatorList, $value, $key)
    {
        $isValid = true;
        // validator chain
        foreach ($validatorList as $filter) {
            $validatorClass = $filter['name'];
            $validatorOptions = $filter['options'];
            $validator = new $validatorClass($validatorOptions);
            $this->callDotFilter($validator, [$key=> $value]);
        }
        return $isValid;
    }
    
    public function validateValues($values)
    {
        $isValid = true;
        $fieldsetList = $this->form->getFieldsetList();
        foreach ($fieldsetList as $fieldset) {
            foreach ($fieldset->getOptions() as $field) {
                // required, but missing
                if ($field['required'] == true && !isset($values[$field['name']])) {
                    $this->errors[] = [$field['name'] . 'is required'];
                    continue;
                }
                // missing, but not required
                if ($field['required'] == false && !isset($values[$field['name']])) {
                    continue;
                }
                $values[$field['name']] = $this->callFilter($field['filters'], $values[$field['name']]);
    
                
                // alternative with no error messages:
                $this->callValidator($field['validators'], $values[$field['name']], $field['name']);
            }
        }
        $this->data = $values;
        return $isValid;
    }
    
    /**
     * Call filter method from DotFilter
     * @access private
     * @param Zend_Validate $validator
     * @param array $values
     * @return void
     */
    private function callDotFilter($validator, $values)
    {
		$dotFilter = new Dot_Filter(array('validator' => $validator, 'values' => $values));
		$dotFilter->filter();
		$this->data = array_merge($this->data, $dotFilter->getData());
		$this->error = array_merge($this->error, $dotFilter->getError());
    }
}
