<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberTransfer extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function providers() 
    {
        return $this->hasMany(Provider::class);
    }
}
