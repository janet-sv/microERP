<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   
   protected $table      = 'payment';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','date', 'number', 'method' , 'type', 'client', 'amount' , 'reference', 'state',
   ];

   

}
