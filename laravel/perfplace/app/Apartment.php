<?php
	
	namespace App;
	use Jenssegers\Mongodb\Eloquent\Model;
	use Storage;

	class Apartment extends Model
	{
	    protected $fillable = ['id','userId','title','description','numberOfRooms','surface','price','propertyType','transactionType','latitude','longitude','country','city','address','floorNumber'];

	    public function getImage($imageNumber) {

			$pathChunk = 'propertyPictures/' . $this->id . '_' .  $imageNumber;

			$possibleImagePaths = array (
				$pathChunk . '.jpg',
				$pathChunk . '.jpeg',
				$pathChunk . '.png',
				$pathChunk . '.svg',
				$pathChunk . '.bmp'
			);
				
			foreach ($possibleImagePaths as $imagePath) {
				if (Storage::disk('local') -> exists('public/'.$imagePath)) {			
					return url('storage/' . $imagePath);
				}
			}
			
			return false;
		}
	}
?>
