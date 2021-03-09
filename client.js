const WebSocket = require('ws')
const http = require('http')

// const ws = new WebSocket('wss://echo.websocket.org:443')
const ws = new WebSocket('ws://127.0.0.1:8080')

ws.on('open', function open() {
	ws.send('Hello World!')
})

ws.on('message', function incoming(data) {
	console.log(data)
})
ws.on('error', function incoming(data) {
	console.log(data)
})
