<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetailPurchase extends Model
{
    protected $table      = 'InvoiceDetailPurchase';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','purchasesinvoice_id', 'product_id', 'quantity' , 'unit_price',
   ];

   public function productstock()
   {
      return $this->hasmany(ProductStock::class);
    }


  public function purchasesinvoice()
   {
      return $this->hasmany(PurchasesInvoice::class);
   }

   

}
