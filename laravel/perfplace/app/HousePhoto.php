<?php

namespace App;

use Jessengers\Mongodb\Eloquent\Model;

class HousePhoto extends Model
{
    protected $fillable = ['property_id', 'filename'];
 
    public function product()
    {
        return $this->belongsTo('App\House');
    }
}
