<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comments extends Model
{

    public $table = "comments";

    // public $timestamps = false; //bu zaten sondurmurdu?Mene sondurmek yo yaratmagi deyirdim

    // public $image;

    // public static function boot() {
        
    //     self::creating(function($model){
    //         dd("OK");
    //     });
    //     parent::boot();
    // }
    
    public function user(){ 

        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
