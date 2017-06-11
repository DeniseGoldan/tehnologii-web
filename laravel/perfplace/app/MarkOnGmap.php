<?php
  namespace App;
  use Jenssegers\Mongodb\Eloquent\Model;

class MarkOnGmap extends Model
{
     protected $fillable = ['type','latitude','longitude','country','city'];
}
