<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Game\Model;

use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

class ScoreTable {

    public function __construct() {
        
    }

    public function resultSetPrototype() {
        return new ResultSet(ResultSet::TYPE_ARRAY);
    }

    public function fetchCurrScore($dbAdapter, $userId) {
        $sql = new Sql($dbAdapter);
        $select = $sql->select();
        $select->from('game_score');
        $select->columns(['won_game', 'loss_game']);
        $select->where(['user_id' => $userId]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $row = $this->resultSetPrototype()->initialize($statement->execute())
                ->toArray();
        return $row;
    }

    public function updateCurrScore($dbAdapter, $userId, $data) {
        $isLoss = $isWon = 0;
        if ($data == "yes") {
            $isWon = 1;
        } else {
            $isLoss = 0;
        }
        $sql = new Sql($dbAdapter);
        $select = $sql->select();
        $select->from('game_score');
//        $select->columns([$isWon]);
        $select->where(['user_id' => $userId]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $row = $this->resultSetPrototype()->initialize($statement->execute())
                ->toArray();

        if (empty($row)) {
            $sql = new Sql($dbAdapter);
            $columns = ["user_id" => $userId, "won_game" => '1', "loss_game" => '1'];
//            print_r($columns); die;
            $insert = $sql->insert();
            $insert->columns($columns);
            print_r($insert); die;
            $statement = $sql->prepareStatementForSqlObject($insert);
            $row = $this->resultSetPrototype()->initialize($statement->execute());
        }
//        $adapter = $this->tableGateway->getAdapter();
//    $otherTable = new Zend\Db\TableGateway\TableGateway('table_name', $adapter);
//    $otherTable->insert($data));
    }

}
