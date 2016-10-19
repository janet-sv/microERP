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
         'id','name' , 'country', ''
      ];


      public function product ()
      {
         // belongsto --- pertenece a
         return $this->belongsto(Product::class);

      }
}
