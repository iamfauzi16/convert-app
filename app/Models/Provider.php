<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  protected $guarded = [];

  public function numberTransfer()
  {
    return $this->belongsTo(NumberTransfer::class);
  }

  public function transactions()
  {
    return $this->hasMany(Transaction::class);
  }
}
