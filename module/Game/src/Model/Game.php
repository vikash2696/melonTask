<?php

namespace Game\Model;

use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Game implements InputFilterAwareInterface {

    public $id;
    public $word;
    public $word_hint;
    public $status;

    public function exchangeArray(array $data) {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->word = !empty($data['word']) ? $data['word'] : null;
        $this->word_hint = !empty($data['word_hint']) ? $data['word_hint'] : null;
        $this->status = !empty($data['status']) ? $data['status'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new DomainException(sprintf(
                '%s does not allow injection of an alternate input filter', __CLASS__
        ));
    }

    public function getInputFilter() {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                    ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'word',
            'required' => true,
            'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
            ],
            'validators' => [
                    [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'word_hint',
            'required' => true,
            'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
            ],
            'validators' => [
                    [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'status',
            'required' => true,
            'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
            ],
            'validators' => [
                    [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

}
