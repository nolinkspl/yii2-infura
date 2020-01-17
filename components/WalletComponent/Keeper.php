<?php

namespace app\components\WalletComponent;

use app\components\WalletComponent\models;
use app\exception;
use yii\web\NotFoundHttpException;

class Keeper {

    /**
     * @return models\Wallet[]
     */
    public function getWalletList() {
        return models\Wallet::find()->all();
    }

    /**
     * @param array $params
     * @throws \Exception
     */
    public function createWallet(array $params) {
        $result = new models\Wallet();
        $result->load($params, '');
        if ($result->validate() && $result->save()) {
            return;
        }

        throw new exception\Validation($result->firstErrors);
    }

    /**
     * @param $address
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function deleteWallet($address) {
        $result = models\Wallet::findOne(['address' => $address]);
        if ($result === null) {
            throw new NotFoundHttpException();
        }

        $result->delete();
    }
}