<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $primaryKey = 'appID';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function kiosk() {
        return $this->belongsTo(Kiosk::class, 'kioskID');
    }

}
