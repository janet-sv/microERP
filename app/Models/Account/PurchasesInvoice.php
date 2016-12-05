<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class PurchasesInvoice extends Model
{
     protected $table      = 'purchasesinvoice';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','document_id','provider_id', 'date_invoice', 'number' , 'date_due', 'amount_total_signed',
      'residual_signed','subtotal','igv', 'state_id','reference',
   ];

   public function provider()
   {
      return $this->hasmany(Provider::class);
    }  

 public function invoicedetailpurchase()
   {
      return $this->belongsto(InvoiceDetailPurchase::class);
    }
    
     public function document_type()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Document_type::class);
      
   }
   
 public function stateinvoice()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Stateinvoice::class);
      
   }

}
