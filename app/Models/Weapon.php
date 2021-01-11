<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    public function world()
    {
        return $this->belongsTo(World::class);
    }
    
    public function current_location()
    {
        return $this->hasOne(Location::class);
    }
}
