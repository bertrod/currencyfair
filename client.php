<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$microseconds = 1000000;
$ctx = new ZMQContext();
$req =  new ZMQSocket($ctx, ZMQ::SOCKET_REQ);
$req->connect("tcp://*:5454");

$currentRate = 0.7471;
//$array = json_decode($message, true);

while (true) {
    $ratechange = rand(-285, 355);
    $rate = $currentRate + $ratechange/1000;
    $message = '{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": '.$rate.', "timePlaced" : "14-JAN-15 10:27:44", "originatingCountry" : "FR"}';
    
    $req->send($message);
    echo $message;
    echo $req->recv();
    usleep($microseconds);
}
