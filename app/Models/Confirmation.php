<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;

    protected $fillabel = [
        'transaction_id','image'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
