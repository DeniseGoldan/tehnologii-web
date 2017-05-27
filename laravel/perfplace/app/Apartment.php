<?php
	
	namespace App;
	use Jenssegers\Mongodb\Eloquent\Model;
	use Storage;

	class Apartment extends Model
	{
	    protected $fillable = ['id','userId','title','description','numberOfRooms','surface','price','propertyType','transactionType','latitude','longitude','country','city','address','floorNumber'];

	    public function getImage($imageNumber){

	        if(Storage::disk('local')->exists('public/propertyPictures/' . $this->id . '_' .  $imageNumber . '.jpg')) {
	            return url('storage/propertyPictures/'.$this->id.'_'.$imageNumber.'.jpg');
	        } 
	        else if(Storage::disk('local')->exists('public/propertyPictures/' . $this->id . '_' .  $imageNumber . '.png')){
	            return url('storage/propertyPictures/'.$this->id.'_'.$imageNumber.'.png');
	        }
	        else if(Storage::disk('local')->exists('public/propertyPictures/' . $this->id . '_' .  $imageNumber . '.bmp')){
	            return url('storage/propertyPictures/'.$this->id.'_'.$imageNumber.'.bmp');
	        }
	        else 
	        {       
                return false;
	        }

    	}

	 	
	}
?>
