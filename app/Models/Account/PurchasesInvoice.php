<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class PurchasesInvoice extends Model
{
     protected $table      = 'purchasesinvoice';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','provider_id', 'date_invoice', 'number' , 'date_due', 'amount_total_signed',
      'residual_signed', 'state',
   ];

   public function provider()
   {
      return $this->hasmany(Provider::class);
    }  

 public function invoicedetailpurchase()
   {
      return $this->belongsto(InvoiceDetailPurchase::class);
    }
    
}
