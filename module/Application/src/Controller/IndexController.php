<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class IndexController extends AbstractActionController {

    public $session;

    public function __construct() {
        $this->session = new Container('User');
    }

    public function indexAction() {
        $isLoginUser = $this->session->offsetExists('userId');
        $userName  = $this->session->offsetGet('username');
        if ($isLoginUser) {
            return new ViewModel([
                'loggedInUser' => "loggedIn",
                'userName' => $userName
            ]);
        }
        return new ViewModel();
    }

}
