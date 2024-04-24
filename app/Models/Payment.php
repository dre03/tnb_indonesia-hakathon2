<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'status_id', 'participant_id'];

    public function participant() 
    {
        return $this->belongsTo(Participant::class, 'participant_id', 'id');
    }

    public function paymentStatus() 
    {
        return $this->belongsTo(PaymentStatus::class, 'status_id', 'id');
    }
}
