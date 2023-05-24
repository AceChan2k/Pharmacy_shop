<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone','mail','msg'];

    public function saveMsg($name, $phone, $mail, $msg){
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->mail = $mail;
            $this->msg = $msg;
            $this->save();
            return true;
        } else {
            return false;
        }
    }
}
