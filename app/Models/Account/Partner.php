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
         'id','name' , 'country', 'department', 'province', 'address' , 'website', 
         'job' , 'Phone' , 'mobile' , 'Fax' , 'mail' , 'title'  
      ];


      public function salesinvoice ()
      {
         // belongsto --- pertenece a
         return $this->belongsto(SalesInvoice::class);

      }
}
