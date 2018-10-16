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

class IndexController extends AbstractActionController {

    private $table;

    public function __construct(UserTable $table) {
        $this->table = $table;
    }   

    public function indexAction() {
        return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]);
        return new ViewModel();
    }

    public function addAction() {
        
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}
