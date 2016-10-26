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
         'id','name' , 'country', 'department', 'province','district', 'address' , 'website', 
         'job' , 'phone' , 'mobile' , 'fax' , 'mail' , 'title' , 
      ];


      public function salesinvoice ()
      {
         // belongsto --- pertenece a el nombre es de la tabla
         return $this->belongsto(SalesInvoice::class);

      }
}
