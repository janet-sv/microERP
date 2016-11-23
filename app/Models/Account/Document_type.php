<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Document_type extends Model
{
    protected $table      = 'document_type';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name', 'description', 'numeration' ,
   ];


   public function salesinvoice ()
      {
         return $this->belongsto(SalesInvoice::class);
         
      }


 public function PurchasesInvoice ()
      {
         
         return $this->belongsto(PurchasesInvoice::class);
         

      }

}
