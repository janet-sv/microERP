<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
   
   protected $table      = 'salesinvoice';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','document_id','partner_id', 'date_invoice', 'number' , 'user_id','date_due', 'amount_total_signed',
      'residual_signed', 'state', 'reference', 
   ];


   public function partner()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Partner::class);
      
   }

      public function document_type()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Document_type::class);
      
   }
     public function user()
   {
      // hasmany - tiene muchas
      return $this->hasmany(User::class);
      
   }

    public function invoicedetailsales()
   {
      return $this->belongsto(InvoiceDetailSales::class);
    }
 

}
