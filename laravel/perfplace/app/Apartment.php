<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['property_id', 'filename'];
}
