<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Accountseatdetail extends Model
{
   protected $table      = 'accountseatdetail';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
     'id','accountseat_id','account_id', 'empresa_id' , 'etiqueta', 'debe' , 'haber'
   ];

  public function accountantSeat()
   {
      // hasmany - tiene muchas
      return $this->belongsTo('App\Models\Account\AccountantSeat', 'accountseat_id');
      
   }

   public function accounts()
   {
      // hasmany - tiene muchas
      return $this->belongsTo('App\Models\Account\Accounts', 'account_id');
   
   }

 public function customer(){
      return $this->belongsTo('App\Models\Sales\Customer', 'empresa_id');  
   
    }




}
