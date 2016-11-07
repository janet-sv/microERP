<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
   
   protected $table      = 'ProductStock';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name', 'description', 'stock' , 'unit price',
   ];

   public function invoicedetailpurchase()
   {
      return $this->belongsto(InvoiceDetailPurchase::class);
   }

   public function invoicedetailsales()
   {
      return $this->belongsto(InvoiceDetailSales::class);
    }



}