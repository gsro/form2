<?php
/**
 * User: @gabidj
 * Date: 10/26/2017
 * Time: 11:38 PM
 */

namespace GSRO\DotKernel\Form2\Fieldset;

class SimpleMessage implements FieldsetInterface
{
    use FieldsetTrait;
    
    public function __construct()
    {
        $this->options = [
            'message' => [
                'name' => 'message',
                'filters' => [
                    [
                        'name' => \Zend_Filter_StripTags::class,
                        'options' => [],
                    ],
                    [
                        'name' => \Zend_Filter_HtmlEntities::class,
                        'options' => [],
                    ]
                ],
                'validators' => [
                    [
                        'name' => \Zend_Validate_StringLength::class,
                        'options' => [
                            'min' => 3,
                            'max' => 2000,
                        ],
                    ],
                ],
                'required' => true
            ]
        ];
    }
}
