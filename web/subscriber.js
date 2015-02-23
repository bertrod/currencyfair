/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = require('http').createServer(handler), 
    io = require('socket.io').listen(app),
    fs = require('fs'),
    zmq  = require('zmq'), 
    sock = zmq.socket('sub');
 
app.listen(8080);
 
sock.connect('tcp://127.0.0.1:1337');
sock.subscribe('');
console.log('Subscriber connected to port 1337');

sock.on('message', function(topic, message) {
  console.log('received a message related to:', topic, 'containing message:', message);
});
