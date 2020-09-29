<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'user-id',
        'ip_address',
        'payment_id',
        'name',
        'phone_no',
        'shipping_address',
        'email',
        'message',
        'is_paid',
        'is_completed',
        'is_seen_by_admin',
        'transaction_id'
    ];
    
    
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    
}
