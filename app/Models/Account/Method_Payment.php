<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Method_Payment extends Model
{
   protected $table      = 'paymentmethod';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name', 'numeration' ,
   ];

	public function payment ()
      {
         return $this->belongsto(Payment::class);
         
      }
}
