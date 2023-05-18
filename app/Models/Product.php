<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price', 'category_id', 'description','image'];

    use HasFactory;
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function getPriceForCount() {
        if(!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

}
