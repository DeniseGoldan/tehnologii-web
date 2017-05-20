<?php

namespace App;

use Jessengers\Mongodb\Eloquent\Model;

class PropertyPhoto extends Model
{
    protected $fillable = ['property_id', 'filename'];
 
    public function product()
    {
        return $this->belongsTo('App\House');
    }
}
