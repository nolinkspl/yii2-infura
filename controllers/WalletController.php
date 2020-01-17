<?php

namespace app\controllers;

use app\components;
use Yii;
use yii\helpers\ArrayHelper;

class WalletController extends BaseController
{
    /** @var components\WalletComponent\Facade */
    private $_walletComponent;

    /**
     * WalletController constructor.
     */
    public function init() {
        parent::init();
        $this->_walletComponent = Yii::$container->get('WalletComponent');
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'wallets' => $this->_walletComponent->getWalletList(),
        ]);
    }

    public function actionCreate() {
        $data = Yii::$app->request->post('data');

        return $this->commonTryCatchResponse(
            function () use ($data) { $this->_walletComponent->createWallet($data); }
        );
    }

    public function actionDelete() {
        $raw = Yii::$app->request->rawBody;
        $data = explode('=', $raw);
        $address = isset($data[1]) ? $data[1] : null;

        $this->commonTryCatchResponse(
            function() use ($address) { $this->_walletComponent->deleteWallet($address); }
        );
    }
}
