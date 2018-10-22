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
use Game\Model\ScoreTable;
use Zend\ServiceManager\ServiceManager;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

class IndexController extends AbstractActionController {

    private $table;
    public $session;

    public function __construct($table) {
        $dbAdapter=$table->get('dbff');
        $this->session = new Container('User');
        $this->table = $dbAdapter;
     $sql    = new Sql($dbAdapter);
$select = $sql->select();
$select->from('word_library');
$select->where(['id' => 2]);

$statement = $sql->prepareStatementForSqlObject($select);
$hhg=$this->resultSetPrototype()->initialize($statement->execute())
        ->toArray();

print_r($hhg);die;
    }

    public function resultSetPrototype()
    {
        return new ResultSet(ResultSet::TYPE_ARRAY);
    }
    
    public function newGameAction() {
        $randomWord = $this->table->fetchARandomWord();
        return new ViewModel([
            'word' => (array) $randomWord,
        ]);
    }

    public function getStatisticAction() {
        $userId = $this->session->offsetExists('userId');

        $scoreTable = new ScoreTable();
   
        $currentScore = $scoreTable->fetchCurrScore($userId);
        print_r($currentScore);
        die("here");
    }

    public function logoutAction() {
        $this->session->getManager()->getStorage()->clear('User');
        return $this->redirect()->toRoute('home');
    }

}
