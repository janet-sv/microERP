<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Type_Payment extends Model
{
   protected $table      = 'paymenttype';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name',
   ];

	public function payment ()
      {
         return $this->belongsto(Payment::class);
         
      }
}
