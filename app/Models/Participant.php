<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id', 'status_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function event() {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function participantStatus() 
    {
        return $this->belongsTo(ParticipantStatus::class, 'status_id', 'id');
    }

    public function payments() {
        return $this->hasMany(Payment::class, 'status_id', 'id');
    }
}
