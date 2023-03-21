<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Models\Message;

use App\Events\MessageEvent;



class ChatController extends Controller
{
    public function __construct(){


    }

    public function index(){
      $user_id=Auth::user()->id;
      $users = DB::table('users')
            ->select(DB::raw("users.id ,
                              name,
                              (SELECT id from messages WHERE (from_id=users.id and to_id=$user_id) or (from_id=$user_id and to_id=users.id) ORDER BY created_at DESC LIMIT 1) as last_message_id,
                              (SELECT count(`messages`.`to_id`) from `messages` WHERE `read_at` is null and `messages`.`to_id`=$user_id  and `messages`.`from_id`=`users`.`id` group by `messages`.`from_id`) as unread_count"))
            ->where('users.id','<>',Auth::user()->id)
            ->orderBy('users.id', 'asc')
            ->get();

      return view('chat',compact('users'));
    }


    public function getMessagesFor($id){
      $messages = Message::where(function($q) use ($id) {
            $q->where('from_id', Auth::user()->id);
            $q->where('to_id', $id);
          })->orWhere(function($q) use ($id) {
            $q->where('from_id', $id);
            $q->where('to_id', Auth::user()->id);
          })
          ->get();
          Message:: where('to_id', Auth::user()->id)
                  ->where('from_id', $id)
                  ->update(['read_at' => now()]);
    return response()->json($messages);

    }

    public function send(Request $request){
      $message = Message::create([
          'from_id' => Auth::user()->id,
          'to_id' => $request->to_id,
          'content' => $request->content
      ]);

      broadcast(new MessageEvent($message));
      return response()->json($message);
    }

    public function show(int $id){

    }
}
