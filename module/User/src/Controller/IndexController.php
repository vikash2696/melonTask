<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Model\UserTable;
use User\Form\UserForm;
use User\Model\User;
use User\Form\LoginForm;
use Zend\Session\Container;

class IndexController extends AbstractActionController {

    private $table;
    public $session;

    public function __construct(UserTable $table) {
        $this->session = new Container('User');
        $this->table = $table;
    }

    public function indexAction() {
        return new ViewModel([
            'users' => $this->table->fetchAll(),
        ]);
        return new ViewModel();
    }

    public function addAction() {
        $form = new UserForm();
        $form->get('submit')->setValue('Add');
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return ['form' => $form];
        }
        $user = new User();
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return ['form' => $form];
        }
        $user->exchangeArray($form->getData());
        $this->table->saveUserData($user);
        return $this->redirect()->toRoute('user');
    }

    public function loginAction() {

        $form = new LoginForm();
        $form->get('submit')->setValue('Login');
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return ['form' => $form];
        }
        $user = new User();
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return ['form' => $form];
        }
        $user->exchangeArray($form->getData());
        $isRegisteredUser = $this->table->loginUser($user);
        if ($isRegisteredUser) {
            $this->session->offsetSet('userId', $isRegisteredUser->id);
            $this->session->offsetSet('username', $isRegisteredUser->username);
            $this->session->offsetSet('email', $isRegisteredUser->email);
            $this->session->offsetSet('name', $isRegisteredUser->first_name . " " . $isRegisteredUser->first_name);
            return $this->redirect()->toRoute('home');
        }else {
            return ['form' => $form];
        }
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}
