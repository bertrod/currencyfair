/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var    zmq = require('zmq'),
    sock = zmq.socket('req');

var app = require('http').createServer(handler), 
    io = require('socket.io').listen(app);

app.listen(8085);
 
function handler (req, res) {
  fs.readFile(__dirname + '/endpoint.php',
  function (err, data) {
    if (err) {
      res.writeHead(500);
      return res.end('Error loading index.html');
    }
 
    res.writeHead(200);
    res.end(data);
  });
}

sock.connect('tcp://127.0.0.1:5454');
sock.emit('a');
console.log('Request connected to port 5454');

sock.on('message', function(message) {
    io.emit('news', message.toString());
    console.log('received a message related to:, topic, containing message:', message.toString());
});

