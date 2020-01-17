<?php

namespace app\components\WalletComponent;

use app\components\WalletComponent\models;
use Yii;
use yii\base\BaseObject;

class Facade extends BaseObject {

    /** @var Keeper */
    private $_keeper;

    public function init() {
        $this->_keeper = Yii::$container->get('WalletComponentKeeper');
    }

    /**
     * @return models\Wallet[]
     */
    public function getWalletList() {
        return $this->_keeper->getWalletList();
    }

    /**
     * @param array $params
     */
    public function createWallet(array $params) {
        $this->_keeper->createWallet($params);
    }

    /**
     * @param $address
     */
    public function deleteWallet($address) {
        $this->_keeper->deleteWallet($address);
    }
}