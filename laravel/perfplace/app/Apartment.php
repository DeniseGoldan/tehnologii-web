<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['id','userId','title','description','numberOfRooms','surface','price','transactionType','latitude','longitude','address','floorNumber'];
}
