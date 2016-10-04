"use strict";

const express = require("express");
const cst = require('console-stamp')(console, '[HH:MM:ss.l]');

// express.logger.format('mydate', function() {
//    var df = require('console-stamp/node_modules/dateformat');
//    return df(new Date(), 'HH:MM:ss.l');
//});
//app.use(express.logger('[:mydate] :method :url :status :res[content-length] - :remote-addr - :response-time ms'));
//

const PORT = 8080;

var amqp = require("amqp-ts");

var rabbitmq_url = process.env.AMQP_URL || "amqp://rabbitmq"
var connection = new amqp.Connection(rabbitmq_url);
var exchange = connection.declareExchange("lora",  'fanout', {durable: true});

connection.completeConfiguration().then(() => {
  console.log("succesfull connected at " +rabbitmq_url)
  const app = express();

  var bodyParser = require('body-parser');
  app.use(bodyParser.json()); 
  app.use(bodyParser.urlencoded({ extended: true })); 

  app.get("/", function (req, res) {
    res.send("KPN Receiver\n");
  });

  app.post("/lora", function (req, res) {
    // var message = JSON.stringify({"params": req.params, "query": req.query, "body": req.body });

    var body = JSON.parse(JSON.stringify(req.body));
    body.query=req.query;

    console.log("msg: " + JSON.stringify(body));
    res.end("thanks!");
    exchange.send(new amqp.Message(body));
  });

  app.listen(PORT);
  console.log("Server running on port " + PORT);
});
