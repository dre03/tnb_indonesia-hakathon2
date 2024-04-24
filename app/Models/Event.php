<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'is_published', 'location', 'date', 'end_date', 'time', 'price', 'thumbnail', 'speaker_id', 'moderator_id', 'event_category_id'];

    public function speaker() 
    {
        return $this->belongsTo(Speaker::class, 'speaker_id', 'id');
    }

    public function moderator() 
    {
        return $this->belongsTo(Moderator::class, 'moderator_id', 'id');
    }

    public function eventCategory() 
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id', 'id');
    }

    public function participants() {
        return $this->hasMany(Participant::class, 'event_id', 'id');
    }
}
