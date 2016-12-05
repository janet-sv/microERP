<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
   
   protected $table      = 'product';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name', 'description', 'stock' , 'unitprice',
   ];

   public function invoicedetailpurchase()
   {
      return $this->belongsto(Detailpurchase::class);
   }

   public function invoicedetailsales()
   {
      return $this->belongsto(DetailSales::class);
   }



}
