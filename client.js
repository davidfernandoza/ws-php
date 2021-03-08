// const WebSocket = require('ws')
// const http = require('http')

// // const ws = new WebSocket('wss://echo.websocket.org:443')
// const server = http.createServer()
// const ws = new WebSocket('http://127.0.0.1:8080')

// ws.on('open', function open() {
// 	ws.send('Hello World!')
// })

// ws.on('message', function incoming(data) {
// 	console.log(data)
// })
// ws.on('error', function incoming(data) {
// 	console.log(data)
// })
const io = require('socket.io-client')
const socket = io('http://127.0.0.1:8080')
socket.connect()
socket.on('message', data => {
	console.log('====================================')
	console.log(data)
	console.log('====================================')
})
// socket.emit('message', () => {})
