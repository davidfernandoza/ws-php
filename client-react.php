<?php
		use Ratchet\Client\{Connector, WebSocket};
		use \Ratchet\RFC6455\Messaging\MessageInterface;

    require __DIR__ . '/vendor/autoload.php';

    $loop = \React\EventLoop\Factory::create();
    $reactConnector = new \React\Socket\Connector($loop);
    $connector = new Connector($loop, $reactConnector);

    $connector('wss://echo.websocket.org:443', [], [])->then(function(WebSocket $conn) {

        $conn->on('message', function(MessageInterface $msg) use ($conn) {
            echo "Received: {$msg}\n";
            // $conn->close();
        });

        $conn->on('close', function($code = null, $reason = null) {
            echo "Connection closed ({$code} - {$reason})\n";
        });

        $conn->send('Hello World!');

    }, function(\Exception $e) use ($loop) {
        echo "Could not connect: {$e->getMessage()}\n";
        $loop->stop();
    });

    $loop->run();