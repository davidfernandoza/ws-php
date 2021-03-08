<?php
use React\Socket\{Server, ConnectionInterface};
use React\EventLoop\Factory;
require __DIR__ . '/vendor/autoload.php';

$loop = Factory::create();
$socket = new Server('127.0.0.1:8080', $loop);

$socket->on('connection', function (ConnectionInterface $connection) {

    $connection->write("Hello " . $connection->getRemoteAddress() . "!\n");
    $connection->write("Welcome to this amazing server!\n");
    $connection->write("Here's a tip: don't say anything.\n");

    $connection->on('data', function ($data) use ($connection) {
        $connection->close();
    });
});

$loop->run();