<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetailSales extends Model
{
     
   protected $table      = 'InvoiceDetailSales';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','SalesInvoice_id', 'product_id', 'quantity' , 'unit_price',
   ];

   public function productstock()
   {
      return $this->hasmany(ProductStock::class);
   }

     public function salesinvoice()
   {
      return $this->hasmany(SalesInvoice::class);
   }
   


}
