<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
class House extends Model
{
   protected $fillable = ['id','title','description','numberOfRooms','surface','price','transactionType','latitude','longitude','numberOfFloors'];
}
