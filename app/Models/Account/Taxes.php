<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
   protected $table      = 'taxes';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name', 'scope_tax', 'tax_calculation' , 'amount',
   ];

}
