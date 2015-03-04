Approach
--------
I have decided to implement a system where the communication is in real time and not 
focusing on the testing side. In order to complete the project I would like to add 
an api endpoint so it is easier to test but as per now the solution runs different
clients from command line. I have used the ZMQ framework due to its support in many
different languages and the easiness to scale the with more workers if needed for 
rate exchange in example. My example though does not use different workers to process
neither displays different charts in a browser as result of the different currencies
but it could easily be implemented.

I want to excuse myself for not getting everything done but I don't have much spare
time.


Installation
------------
You need to install the zmq library and the node js engine as described in the links
below:

http://zeromq.org/bindings:php

https://www.digitalocean.com/community/tutorials/how-to-install-an-upstream-version-of-node-js-on-ubuntu-12-04

Setup
-----
A new virtual host needs to be setup pointing to the contents of the web folder.

Scripts
-------
client.php
Sends requests to the message processor with a random number. It runs every second
but a different value can be setup within the script.

hub.php
Message processor. Process messages from different clients and the information to 
the web socket

web\sub.js
Web socket that gets the information from the hub and passes it to the web page.

web\index.html
Page to display the information submitted in real time. It uses the amcharts
library.

How to get the example to work
------------------------------
You need to open one or more windows to run the client.php job and one window for the hub.php
and another one for sub.js

$php client.php # w1
$php hub.php # w2
$node sub.js # w3

In the browser you can open the index.html file to see how the transactions flow in real time.
You can run different clients and also you can stop the hub or the sub.js servers anytime.
The queuing mechanism is in both client and hub so if the hub is down no data is lost.

Please contact me for any queries at aerodrigo@gmail.com