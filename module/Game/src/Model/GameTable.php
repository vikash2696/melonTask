<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Game\Model;

use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

class GameTable {

    public $dbAdapter;

    public function __construct() {
    }

    public function resultSetPrototype() {
        return new ResultSet(ResultSet::TYPE_ARRAY);
    }

    public function fetchARandomWord($dbAdapter) {
        $sql = new Sql($dbAdapter);
        $select = $sql->select();
        $select->from('word_library');
        $statement = $sql->prepareStatementForSqlObject($select);
        $count = $this->resultSetPrototype()->initialize($statement->execute())
                ->count();
        $randomId = random_int(1, $count);
        $id = (int) $randomId;
        $select = $sql->select();
        $select->from('word_library');
        $select->where(['id' => $id]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $row = $this->resultSetPrototype()->initialize($statement->execute())
                ->toArray();
        return $row;
    }

}
