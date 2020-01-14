<?php

namespace app\controllers;

use app\models\Wallet;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $wallets = Wallet::find()->all();

        return $this->render('index', [
            'wallets' => $wallets,
        ]);
    }
}
