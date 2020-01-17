function WsClient() {
    let sockets = [];
    const monitor = $('.js-transaction-monitor');

    function subscribePendingTransactionFilter(socket) {
        socket.send('{"jsonrpc":"2.0","method":"eth_newPendingTransactionFilter","params":[],"id":1}');
    }

    function getWalletsAddresses () {
        const $elems = $('.js-wallet-address');
        let result = [];
        $.each($elems, function (i, el) {
            result.push($(el).data('address'));
        });

        return result;
    }

    function renderTransactionEvent(event) {
        console.log(event);
        const $row = $('<div class="row">');
        $row.html(event.data);
        monitor.prepend($row);
    }

    function createWsWalletConnection(address) {
        try {
            const result = new WebSocket(`wss://mainnet.infura.io/ws/v3/${address}`);
            result.onopen = function(e) {
                subscribePendingTransactionFilter(result,'{"jsonrpc":"2.0","method":"eth_newPendingTransactionFilter","params":[],"id":1}');
            };

            result.onmessage = function (e) {
                renderTransactionEvent(e);
            };

            return result;
        } catch (e) {
            console.log(e);
        }
    }

    this.init = function () {
        const addresses  = getWalletsAddresses();
        $.each(addresses, function (i, address) {
            sockets.push(createWsWalletConnection(address))
        });
    };
}

const wsClient = new WsClient();
wsClient.init();