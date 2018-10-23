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
        $isExist = $this->fetchCurrScore($dbAdapter, $userId);
        $sql = new Sql($dbAdapter);
        if (empty($isExist)) {
            if ($data == "yes") {
                $isWon = 1;
                $isLoss = 0;
            } else {
                $isWon = 0;
                $isLoss = 1;
            }
            $columns = ["user_id" => $userId, "won_game" => $isWon, "loss_game" => $isLoss];
            $insert = $sql->insert('game_score');
            $insert->values($columns);
        } else {
            if ($data == "yes") {
                $isWon = $isExist[0]['won_game'] + 1;
                $isLoss = $isExist[0]['loss_game'];
            } else {
                $isWon = $isExist[0]['won_game'];
                $isLoss = $isExist[0]['loss_game'] + 1;
            }
            $columns = ["user_id" => $userId, "won_game" => $isWon, "loss_game" => $isLoss];
            $insert = $sql->update('game_score');
            $insert->set($columns);
            $insert->where(['user_id' => $userId]);
        }
        $insertString = $sql->getSqlStringForSqlObject($insert);
        $dbAdapter->query($insertString, \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
    }

}
