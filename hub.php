<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ctx = new ZMQContext();
$front = new ZMQSocket($ctx, ZMQ::SOCKET_REP);
$back = new ZMQSocket($ctx, ZMQ::SOCKET_PUB);
//$back->setSockOpt(ZMQ::SUBSCRIBE, 'graphdata');
$front->bind("tcp://*:5454");
$back->bind("tcp://*:1337");

$currencyMatrix = array();
//$read  = $write = array();

while(true) {
    $msg = $front->recv();
//    echo $msg;

    $messageArray = json_decode($msg, true);
            
    $currencyMatrix[$messageArray['currencyFrom']][$messageArray['currencyTo']] = $messageArray['rate'];
    $msgout = json_encode($currencyMatrix);
            
            echo $msgout;
            
    $front->send("OK\n");
    $back->send($msgout);
  //  }

}