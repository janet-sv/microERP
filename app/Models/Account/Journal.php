<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
   protected $table      = 'journal';
   protected $primarykey = 'id';
   public    $timestamps = false;

   protected  $fillable= [
      'id','name', 'description' ,
   ];


  
}
