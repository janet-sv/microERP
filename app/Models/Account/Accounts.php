<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
   protected $table      = 'accounts';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','code', 'name', 'account_level' , 'account_type', 'analysis_type', 'debit' , 'credit', 'bank_cuenta',
   ];
}
