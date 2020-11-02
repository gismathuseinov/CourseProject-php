<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->hasOne(Complaint::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
