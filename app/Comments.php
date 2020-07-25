<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comments extends Model
{
    protected $fillable = ['user_id','email','company_name','complaint_title','complaint_body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
