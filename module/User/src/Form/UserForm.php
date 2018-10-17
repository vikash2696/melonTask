<?php

namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form {

    public function __construct($name = null) {
        parent::__construct('user');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'options' => [
                'label' => 'First Name',
            ],
        ]);
        $this->add([
            'name' => 'last_name',
            'type' => 'text',
            'options' => [
                'label' => 'Last Name',
            ],
        ]);
        $this->add([
            'name' => 'username',
            'type' => 'text',
            'options' => [
                'label' => 'User Name',
            ],
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
            ],
        ]);
         $this->add([
            'name' => 'cnfpassword',
            'type' => 'password',
            'options' => [
                'label' => 'Confirm Password',
            ],
        ]);
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email',
            ],
        ]);
        $this->add([
            'name' => 'address',
            'type' => 'textarea',
            'options' => [
                'label' => 'Address',
            ],
        ]);
        $this->add([
            'name' => 'phone',
            'type' => 'number',
            'options' => [
                'label' => 'Phone',
            ],
        ]);
        $this->add([
            'name' => 'state',
            'type' => 'text',
            'options' => [
                'label' => 'State',
            ],
        ]);
        $this->add([
            'name' => 'city',
            'type' => 'text',
            'options' => [
                'label' => 'City',
            ],
        ]);
        $this->add([
            'name' => 'country',
            'type' => 'text',
            'options' => [
                'label' => 'Country',
            ],
        ]);
        $this->add([
            'name' => 'aboutme',
            'type' => 'textarea',
            'options' => [
                'label' => 'About Me',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ],
        ]);
        $this->add([
            'name' => 'register',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Register',
                'id' => 'registerbutton',
            ],
        ]);
    }

}
