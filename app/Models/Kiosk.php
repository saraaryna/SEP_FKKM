<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    use HasFactory;
    protected $primaryKey = 'kioskID';


    /**
     * Get the applications for the kiosk.
     */
    public function applications()
    {
        return $this->hasMany(Application::class, 'kioskID');
    }
}
