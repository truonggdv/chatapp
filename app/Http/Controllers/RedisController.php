<?php

namespace App\Http\Controllers;
use App\Message;
use App\Events\RedisEvent;

use Illuminate\Http\Request;

class RedisController extends Controller
{
    public function index(){
        // Tìm xem user có quyền xem chat nội dung của tag nào. ví dụ group_a;
        $tag = $_GET['tag']??'group_a';
        $data = Message::where(['tag' => $tag])->get();
        return view('index',compact('data', 'tag'));
    }

    public function postMessage(Request $request){
        $data = $request->only(['author', 'content', 'tag']);
        // Tuỳ biến từ khoá chat
        // $data['tag'] = 'group_a';
        $message = Message::create($data);
        event(
            $e = new RedisEvent($message)
        );
        return redirect()->back();
    }
}
