<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model;

class Twitt extends Model
{
    protected $fillable = ['type','text','twittId'];
}
