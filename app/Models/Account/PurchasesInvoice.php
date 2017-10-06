<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class PurchasesInvoice extends Model
{
     protected $table      = 'purchasesinvoice';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','document_id','provider_id', 'date_invoice', 'number' ,'user_id', 'date_due', 'amount_total_signed',
      'residual_signed','subtotal','igv', 'state_id','reference',
   ];

   public function provider()
   {
      //return $this->hasmany(Provider::class);
        return $this->belongsTo('App\Models\Account\Provider', 'provider_id');

   }

    public function user()
  {
     // hasmany - tiene muchas
     return $this->belongsTo('App\User', 'user_id');

  }


 public function detailpurchase()
   {

        return $this->hasMany('App\Models\Account\Detailpurchase', 'invoice_id');
    }

    public function document_type()
 {
    // hasmany - tiene muchas

    return $this->belongsTo('App\Models\Account\Document_type', 'document_id');

 }


 public function stateinvoice()
   {
      // hasmany - tiene muchas
    return $this->belongsTo('App\Models\Account\Stateinvoice','state_id');

   }

//*****************


}
