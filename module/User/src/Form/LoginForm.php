<?php

namespace User\Form;

use Zend\Form\Form;

class LoginForm extends Form {

    public function __construct($name = null) {
        parent::__construct('user');

        $this->add([
            'name' => 'username',
            'type' => 'text',

            'attributes' => array(
                'class' => 'input_field',
                'placeholder' => "User name"
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
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Login',
                'id' => 'Loginbutton',
            ],
            'attributes' => array(
                'class' => 'login_btn',
            )
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
