<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="data">
        @foreach ($data as $item)
            <p id="{{$item->id}}">{{$item->author}} : {{$item->content}}</p>
        @endforeach
    </div>
    <form action="/message" method="post">
        @csrf
        Name: <input type="text" name="author">
        <br>
        <br>
        <textarea name="content" id="" cols="50" rows="5"></textarea>
        <br>
        <button type="submit">OK</button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.3/socket.io.min.js"></script>
<script>
    var socket = io("http://localhost:6001");
    socket.on('chat:message',function(data){
        if($('#'+data.id).length==0){
            $(".data").append('<p>'+data.author+':'+data.content+'</p>')
        }
        else{
            console.log("Da co tin nhan");
        }
    })
</script>
</html>