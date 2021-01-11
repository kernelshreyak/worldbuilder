<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class World extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function weapons()
    {
        return $this->hasMany(Weapon::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    } 

    public function skills_and_abilities()
    {
        return $this->hasMany(SkillsAbilities::class);
    }


}
