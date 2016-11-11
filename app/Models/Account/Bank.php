<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
   protected $table      = 'bank';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name_bank', 'number', 'debit' , 'payment',
   ];

}
