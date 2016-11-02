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
         // belongsto --- pertenece a el nombre es de la tabla
         return $this->belongsto(SalesInvoice::class);
         //factory(App\Models\Account\Partner::class, 4 )->create();

      }
}
