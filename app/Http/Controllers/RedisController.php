<?php

namespace App\Http\Controllers;
use App\Message;
use App\Events\RedisEvent;

use Illuminate\Http\Request;

class RedisController extends Controller
{
    public function index(){
        $data = Message::all();
        return view('index',compact('data'));
    }

    public function postMessage(Request $request){
        $messages = Message::create($request->all());


        event(
            $e = new RedisEvent($messages)
        );


        return redirect()->back();
    }
}
