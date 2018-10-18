<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Game\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class GameTable {

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        return $this->tableGateway->select();
    }

    public function fetchARandomWord() {
        $allWord = $this->fetchAll();
        $count = 0;
        foreach ($allWord as $word) {
            ++$count;
        }
        $randomId = random_int(1, $count);
        $id = (int) $randomId;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf(
                    'Could not find row with identifier %d', $id
            ));
        }
        return $row;
    }

}
