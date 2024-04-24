<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'profile', 'gender'];

    public function events() 
    {
        return $this->hasMany(Event::class, 'moderator_id', 'id');
    }
}
