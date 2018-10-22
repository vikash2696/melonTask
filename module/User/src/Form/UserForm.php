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
           
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Title"
            )
        ]);
        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "First Name"
            )
        ]);
        $this->add([
            'name' => 'last_name',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Last Name"
            )
        ]);
        $this->add([
            'name' => 'username',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "User Name"
            )
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'password',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Password"
            )
        ]);
         $this->add([
            'name' => 'cnfpassword',
            'type' => 'password',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Confirm Password"
            )
        ]);
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Email Address"
            )
        ]);
        $this->add([
            'name' => 'address',
            'type' => 'textarea',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Address"
            )
        ]);
        $this->add([
            'name' => 'phone',
            'type' => 'number',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Phone Number"
            )
        ]);
        $this->add([
            'name' => 'state',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "State"
            )
        ]);
        $this->add([
            'name' => 'city',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "City"
            )
        ]);
        $this->add([
            'name' => 'country',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "Country"
            )
        ]);
        $this->add([
            'name' => 'aboutme',
            'type' => 'textarea',
            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "About Me"
            )
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
