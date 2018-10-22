<?php

namespace Game\Form;

use Zend\Form\Form;

class GameForm extends Form {

    public function __construct($name = null) {
        parent::__construct('game');

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
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Login',
                'id' => 'Loginbutton',
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

