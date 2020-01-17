<?php

use app\components\WalletComponent;

/**
 * @var $this yii\web\View
 * @var WalletComponent\models\Wallet[] $wallets
 */

$this->title = 'Test LOL';

?>
<div class="site-index">
    <div class="body-content">
        <div class="col-md-6 js-transaction-block">
            <h2> Transaction Monitor</h2>
            <div class="js-transaction-monitor"></div>
        </div>
        <div class="col-md-6 js-wallet-block">
            <h2> Wallet List</h2>
            <span class="btn btn-default js-wallet-add"><i class="glyphicon-plus"></i></span>
            <br>
            <br>
            <?php foreach ($wallets as $wallet) { ?>
            <div class="row">
                <div class="col-md-7">
                    <span class="js-wallet-address" data-address="<?= $wallet->address ?>"><?= $wallet->address ?></span>
                </div>
                <div class="col-md-2"><p class="js-wallet-balance"><?= $wallet->balance ?> ETH</p></div>
                <div class="col-md-2"><a class="btn btn-danger js-wallet-delete" data-href="wallet-delete-<?= $wallet->id ?>"><i class="glyphicon-minus"></i></a></div>
            </div>
            <?php } ?>
        </div>

    </div>
</div>

<div class="popover popup-add-wallet">
    <div class="popover-content">
        <div class="popover-title">
            <h2>Add Wallet</h2>
            <b class="icon icon-close js-modal-close"></b>
        </div>
        <div class="global-form">
            <form action="" method="post">
                <label class="form-row">
                    <input name="address" class="form-input input-sm" type="text" placeholder="Address" maxlength="64" required/>
                    <span class="form-error"></span>
                </label>
                <div class="form-row">
                    <button class="button button-medium js-add-wallet-submit" type="button">Add wallet</button>
                </div>
            </form>
        </div>
    </div>
</div>
