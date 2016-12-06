<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Detailpurchase extends Model
{
     protected $table      = 'purchasesinvoicedetail';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','invoice_id', 'product_id', 'code','amount' , 'unitprice', 'discounts' , 'total',
   ];

   
     public function purchasesInvoice()
   {
      // hasmany - tiene muchas
      return $this->hasmany(PurchasesInvoice::class);
      
   }

      public function accounts()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Accounts::class);
      
   }

}
