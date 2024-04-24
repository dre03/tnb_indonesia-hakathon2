<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function payments() 
    {
        return $this->hasMany(Payment::class, 'status_id', 'id');
    }
}
