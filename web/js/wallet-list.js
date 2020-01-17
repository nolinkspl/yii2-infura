$(document).on('click', '.js-wallet-add', function () {
    popupAddWalletToggle();
});

$(document).on('click', '.js-add-wallet-submit', function () {
    let address = $('[name=address]').val();

    $.post('wallet/create', {
        data: {address: address},
        success: function () {
            popupAddWalletToggle();
            //location.reload();
        },
        error: function (equest, msg, error) {
            alert(msg);
        }
    });
});

$(document).on('click', '.js-wallet-delete', function () {
    let address = $(this).closest('.row').find('.js-wallet-address').data('address');

    $.ajax('wallet/delete', {
        data: {address: address},
        type: 'DELETE',
        success: function (response) {
            //location.reload();
        },
        error: function (request, msg, error) {
            alert(msg);
        }
    });
});

function popupAddWalletToggle() {
    $('.popup-add-wallet').toggle();
}