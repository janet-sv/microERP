<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class AccountantSeat extends Model
{
   protected $table      = 'accountantseat';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      
      'id','date', 'code', 'number' , 'company', 'reference', 'diario_id' , 'amount', 'state',

   ];


 public function __construct()
    {
    
    }


    public function journal()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Journal::class);
      
   }


}
