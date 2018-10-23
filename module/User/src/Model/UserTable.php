<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace User\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class UserTable {

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        return $this->tableGateway->select();
    }

    public function getUserData($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf(
                    'Could not find row with identifier %d', $id
            ));
        }
        return $row;
    }

    public function saveUserData(User $user) {
        $data = [
            'title' => $user->title,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'username' => $user->username,
            'password' => md5($user->password),
            'email' => $user->email,
            'address' => $user->address,
            'phone' => $user->phone,
            'state' => $user->state,
            'city' => $user->city,
            'country' => $user->country,
            'aboutme' => $user->aboutme,
            'status' => '1'
        ];
        $id = (int) $user->id;
        if ($id === 0) {
            $isExistEmail = $this->checkExistEmail($data['email']);
            if (empty($isExistEmail)) {
                $this->tableGateway->insert($data);
            }else {
                return false;
            }
            return;
        }
        if (!$this->getUserData($id)) {
            throw new RuntimeException(sprintf(
                    'Cannot update album with identifier %d; does not exist', $id
            ));
        }
        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function checkExistEmail($email) {
        $rowset = $this->tableGateway->select(['email' => $email]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf(
                    'Could not find row with identifier %d', $id
            ));
        }
        return $row;
    }

    public function loginUser(User $user) {
        $data = [
            'username' => $user->username,
            'password' => md5($user->password),
        ];
        $where = ['username' => $data['username'],
            'password' => $data['password']];
        $rowset = $this->tableGateway->select($where);
        $row = $rowset->current();
        if ($row) {
            return $row;
        }
        return false;
    }

}
