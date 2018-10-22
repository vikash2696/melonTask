<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Game\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Game\Model\GameTable;
use Game\Form\UserForm;
use Game\Model\Game;
use Game\Form\GameForm;
use Zend\Session\Container;

class IndexController extends AbstractActionController {

    private $table;
    public $session;

    public function __construct(GameTable $table) {
        $this->session = new Container('User');
        $this->table = $table;
    }

    public function newGameAction() {
        $randomWord = $this->table->fetchARandomWord();
//        echo "<pre>";
//        print_r((array)$randomWord); die;
        return new ViewModel([
            'word' => (array)$randomWord,
        ]);
    }

    public function loginAction() {
        
    }

    public function logoutAction() {
        $this->session->getManager()->getStorage()->clear('User');
        return $this->redirect()->toRoute('home');
    }

}
