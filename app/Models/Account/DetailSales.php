<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class DetailSales extends Model
{
       protected $table      = 'salesinvoicedetail';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','invoice_id', 'product_id','code', 'amount' , 'unitprice', 'discounts' , 'total',
   ];

   public function salesInvoice()
   {
      // hasmany - tiene muchas
      return $this->belongsTo('App\Models\Sales\SalesInvoice', 'invoice_id');
      
   }

    public function accounts()
   {
      // hasmany - tiene muchas
      return $this->belongsTo('App\Models\Sales\Accounts', 'code');
      
   }

    public function product(){
        return $this->belongsTo('App\Models\Logistic\Product\Product', 'product_id');
    }

    
}
