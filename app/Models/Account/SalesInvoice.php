<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
   
   protected $table      = 'SalesInvoice';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','partner_id', 'date_invoice', 'number' , 'user_id','date_due', 'amount_total_signed',
      'residual_signed', 'state',
   ];


   public function partner()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Partner::class);
      
   }

     public function user()
   {
      // hasmany - tiene muchas
      return $this->hasmany(User::class);
      
   }
 
}
