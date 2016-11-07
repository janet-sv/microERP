<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
     //
      protected $table = 'partner';

      protected $primarykey = 'id';

      public $timestamps = false;
      

      protected $fillable = [
         'id','name' ,'ruc', 'country','department', 'province','district', 'address' , 'website', 
          'phone' , 'mobile' , 'fax' , 'mail' , 'dni_contact' ,'title_contact' ,'contact' , 'job' ,
      ];


      public function salesinvoice ()
      {
         return $this->belongsto(SalesInvoice::class);
         
      }
}
