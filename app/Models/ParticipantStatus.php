<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function participants() {
        return $this->hasMany(Participant::class, 'status_id', 'id');
    }
}
