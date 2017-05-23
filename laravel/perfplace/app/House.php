<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
class House extends Model
{
   protected $fillable = ['id','userId','title','description','numberOfRooms','surface','price','transactionType','latitude','longitude','country','city','address','numberOfFloors'];
}
