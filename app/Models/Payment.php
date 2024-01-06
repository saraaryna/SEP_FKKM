<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'payID';

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function application() 
    {
        return $this->belongsTo(Application::class, 'appID');
    }
}
