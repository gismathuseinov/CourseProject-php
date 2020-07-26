<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comments extends Model
{
    protected $fillable = ['email', 'company_name', 'complaint_title', 'complaint_body','is_letted'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
