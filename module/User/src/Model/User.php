<?php

namespace User\Model;

use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class User implements InputFilterAwareInterface {

    public $id;
    public $title;
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $email;
    public $address;
    public $phone;
    public $state;
    public $city;
    public $country;
    public $aboutme;

    public function exchangeArray(array $data) {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
        $this->first_name = !empty($data['first_name']) ? $data['first_name'] : null;
        $this->last_name = !empty($data['last_name']) ? $data['last_name'] : null;
        $this->username = !empty($data['username']) ? $data['username'] : null;
        $this->password = !empty($data['password']) ? $data['password'] : null;
        $this->email = !empty($data['email']) ? $data['email'] : null;
        $this->address = !empty($data['address']) ? $data['address'] : null;
        $this->phone = !empty($data['phone']) ? $data['phone'] : null;
        $this->state = !empty($data['state']) ? $data['state'] : null;
        $this->city = !empty($data['city']) ? $data['city'] : null;
        $this->country = !empty($data['country']) ? $data['country'] : null;
        $this->aboutme = !empty($data['aboutme']) ? $data['aboutme'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new DomainException(sprintf(
                '%s does not allow injection of an alternate input filter', __CLASS__
        ));
    }

    public function getInputFilter() {
        if (isset($this->inputFilter)) {
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
            'name' => 'title',
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
            'name' => 'first_name',
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
            'name' => 'last_name',
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
            'name' => 'username',
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
            'name' => 'password',
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
            'name' => 'cnfpassword',
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
                    [
                    'name' => 'Identical',
                    'options' => [
                        'token' => 'password',
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'email',
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
                   [
            'name' => 'EmailAddress',
            'options' => [
              'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
              'useMxCheck' => false,                            
            ],
          ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'address',
            'required' => false,
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
            'name' => 'phone',
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
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'state',
            'required' => false,
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
            'name' => 'city',
            'required' => false,
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
            'name' => 'country',
            'required' => false,
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
            'name' => 'aboutme',
            'required' => false,
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
                        'max' => 500,
                    ],
                ],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

}
