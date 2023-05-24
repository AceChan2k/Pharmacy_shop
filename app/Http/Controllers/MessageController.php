<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Сохранение сообщения
    public function msgConfirm(Request $request){
       $Validate=$request->all();
       Message::create($Validate);

        return redirect()->route('home');
    }
      
}
