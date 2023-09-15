<?php

namespace App\Models;

use App\Models\User;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  
  public function provider()
  {
    return $this->belongsTo(Provider::class);
  }

  public function bankUser()
  {
    return $this->belongsTo(BankUser::class);
  }



}
