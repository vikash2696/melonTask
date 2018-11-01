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
use Zend\Session\Container;
use Game\Model\ScoreTable;
use Game\Model\BaseModel;

class IndexController extends AbstractActionController {

    public $session;
    public $dbAdapter;

    public function __construct($db) {
        $this->dbAdapter = $db->get('dbAdapter');
        $this->session = new Container('User');
    }

    public function newGameAction() {
        $userId = $this->session->offsetExists('userId');
        if ($userId) {
            $gameTable = new GameTable();
            $randomWord = $gameTable->fetchARandomWord($this->dbAdapter);
            return new ViewModel([
                'word' => $randomWord[0],
            ]);
        } else {
            return $this->redirect()->toRoute('home');
        }
    }

    public function statisticAction() {
        $userId = $this->session->offsetGet('userId');
        if ($userId) {
            $scoreTable = new ScoreTable();
            $currentScore = $scoreTable->fetchCurrScore($this->dbAdapter, $userId);
            if (empty($currentScore)) {
                $currentScore[0] = ['won_game' => 0, 'loss_game' => 0];
            }
            return new ViewModel([
                'score' => $currentScore[0],
            ]);
        } else {
            return $this->redirect()->toRoute('home');
        }
    }

    public function logoutAction() {
        $this->session->getManager()->getStorage()->clear('User');
        return $this->redirect()->toRoute('home');
    }

    public function updateStatisticAction() {
        $userId = $this->session->offsetGet('userId');
        if ($userId) {
            $data = $_GET['data'];
            $scoreTable = new ScoreTable();
            $currentScore = $scoreTable->updateCurrScore($this->dbAdapter, $userId, $data);
            return true;
        } else {
            return $this->redirect()->toRoute('home');
        }
    }

}
