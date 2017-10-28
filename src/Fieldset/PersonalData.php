<?php
/**
 * User: @gabidj
 * Date: 10/26/2017
 * Time: 11:38 PM
 */

namespace GSRO\DotKernel\Form2\Fieldset;

class PersonalData implements FieldsetInterface
{
    use FieldsetTrait;
    
    public function __construct()
    {
        $this->options = [
            'firstName' => [
                'name' => 'firstName',
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
                            'max' => 100,
                        ],
                    ],
                    [
                        'name' => \Zend_Validate_Alnum::class,
                        'options' => [
                            'allowWhiteSpace' => true
                        ]
                    ],
                ],
                'required' => true
            ],
            'lastName' => [
                'name' => 'lastName',
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
                            'max' => 100,
                        ],
                    ],
                    [
                        'name' => \Zend_Validate_Alnum::class,
                        'options' => [
                            'allowWhiteSpace' => true
                        ]
                    ],
                ],
                'required' => true
            ],
            'email' => [
                'name' => 'email',
                [
                    'name' => \Zend_Validate_StringLength::class,
                    'options' => [
                        'min' => 3,
                        'max' => 100,
                    ],
                ],
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
                        'name' => \Zend_Validate_EmailAddress::class,
                        'options' => []
                    ],
                ],
                'required' => true
            ],
        ];
    }
}
