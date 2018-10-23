<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Game\Model;

use Zend\Db\ResultSet\ResultSet;
use Game\Controller\IndexController;

class BaseModel {

    public $dbAdapter;
    
     public function __construct() {
        
    }

    public function setdbAdapter($dbAdapter) {
        $this->dbAdapter = $dbAdapter;
    }

    public function getdbAdapter() {
        return $this->dbAdapter;
    }

    public function resultSetPrototype() {
        return new ResultSet(ResultSet::TYPE_ARRAY);
    }

}
