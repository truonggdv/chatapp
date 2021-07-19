const express = require("express")
var cors = require('cors');
var app = express();
app.use(cors());
var server = app.listen(6001);
var io = require('socket.io')(server, {
    cors: {
      origin: '*',
    }
});


// var io = require('socket.io')(6001);
console.log('ket noi cong 6001');
io.on('error',function(socket){
    console.log('error');
});
io.on('connection',function(socket){
    console.log('Co nguoi vua ket noi '+socket.id);
});
var Redis = require('ioredis');
var redis = new Redis(1000);
redis.psubscribe("*",function(error,count){
})
redis.on('pmessage',function(partner,channel,message){
    console.log(message);
    message = JSON.parse(message)
    io.emit(channel +":"+message.event,message.data.message)
    console.log('sent');
});