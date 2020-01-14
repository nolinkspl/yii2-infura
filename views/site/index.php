<?php

use app\models;

/**
 * @var $this yii\web\View
 * @var models\Wallet[] $wallets
 */

$this->title = 'Test LOL';

?>
<div class="site-index">
    <div class="body-content">
        <div class="col-md-5 js-transaction-block">
            <h2> Transaction Monitor</h2>
            <div class="js-transaction-monitor"></div>
        </div>
        <div class="col-md-5 js-wallet-block">
            <h2> Wallet List </h2>
            <?php foreach ($wallets as $wallet) { ?>
            <div class="row">
                <div class="col-md-10"><a href="<?= $wallet->address ?>"><?= $wallet->address ?></a></div>
                <div class="col-md-2"><p><?= $wallet->balance ?> ETH</p></div>
            </div>
            <?php } ?>
        </div>

    </div>
</div>
