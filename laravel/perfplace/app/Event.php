<?php
  namespace App;
  use Jenssegers\Mongodb\Eloquent\Model;

class Event extends Model
{
     protected $fillable = ['type','latitude','longitude','country','city'];
}
