<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Chat;

require __DIR__ . '/vendor/autoload.php';
$port = 8080;

try {
	echo "Server run in:  'ws://127.0.0.1:{$port} \n";
	$server = IoServer::factory(
			new HttpServer(
					new WsServer(
							new Chat()
					)
			),
			$port
	);
	$server->run();
} catch (\Throwable $th) {
	echo "Error server: {$th}";
}