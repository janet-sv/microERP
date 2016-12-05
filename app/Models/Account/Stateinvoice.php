<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Stateinvoice extends Model
{
    protected $table      = 'stateinvoice';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name', 'description'
   ];


   public function salesinvoice ()
      {
         return $this->belongsto(SalesInvoice::class);
         
      }


 public function PurchasesInvoice ()
      {
         
         return $this->belongsto(PurchasesInvoice::class);
         

      }

}
