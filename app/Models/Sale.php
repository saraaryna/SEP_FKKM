<?php

//ERNIE MASTURA BINTI BAKRI (CB21161)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $primaryKey = 'salesID';
    protected $table = 'sales';

    protected $fillable = [
        
        'salesDate',
        'salesTotal',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'userID')->withDefault();
    }

    public function kiosks()
    {
        return $this->belongsTo(Kiosk::class, 'kioskID')->withDefault();
    }

}
