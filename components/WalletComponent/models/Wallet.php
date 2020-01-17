<?php

namespace app\components\WalletComponent\models;

use yii\db\ActiveRecord;

/**
 * Class Wallet
 * @package app\models
 * @property int $id
 * @property string $address
 * @property float $balance
 */
class Wallet extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['address', 'required'],
            ['balance', 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}