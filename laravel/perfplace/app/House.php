<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Storage;
class House extends Model
{
   protected $fillable = ['id','userId','title','description','numberOfRooms','surface','price','propertyType','transactionType','latitude','longitude','country','city','address','numberOfFloors'];

    public function getImage($imageNumber){
        if(Storage::disk('local')->exists('propertyPictures/' . $this->id . '_' .  $imageNumber . '.jpg')) {
            return url('storage/propertyPictures/'.$this->id.'_'.$imageNumber.'.jpg');
        } 
        else if(Storage::disk('local')->exists('propertyPictures/' . $this->id . '_' .  $imageNumber . '.png')){
            return url('storage/propertyPictures/'.$this->id.'_'.$imageNumber.'.png');
        }
        else if(Storage::disk('local')->exists('propertyPictures/' . $this->id . '_' .  $imageNumber . '.bmp')){
            return url('storage/propertyPictures/'.$this->id.'_'.$imageNumber.'.bmp');
        }
        else 
        {       
                return false;
        }
    }
}

