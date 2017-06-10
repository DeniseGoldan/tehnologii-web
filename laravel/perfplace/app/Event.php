<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model;
use Storage;

class Event extends Model
{
    protected $fillable = ['id','type','latitude','longitude'];

    public static function addEventFromTwitt($twitt) {

    }
}
