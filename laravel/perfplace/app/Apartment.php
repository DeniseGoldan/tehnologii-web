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
		public function getImagePath($imageNumber) {

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
                    return 'public/'.$imagePath;
                }
            }
            return false;
        }

        public static function filter($input){
            $country = $input['country'];
            $city = $input['city'];
            $priceMin = $input['priceMin']!=null ? intval($input['priceMin']) : 0;
            $priceMax = $input['priceMax']!=null ? intval($input['priceMax']) : 1000000000;
            $roomsMin = $input['roomsMin']!=null ? intval($input['roomsMin']) : 0;
            $roomsMax = $input['roomsMax']!=null ? intval($input['roomsMax']) : 1000;
            $surfaceMin = $input['surfaceMin']!=null ? intval($input['surfaceMin']) : 0;
            $surfaceMax = $input['surfaceMax']!=null ? intval($input['surfaceMax']) : 100000; 
            
            if(!isset($input['apartmentCheck'])||strcmp($input['apartmentCheck'],'on')!=0){
                return null;
            }

            $apartments = Apartment::where('country',$country)->where('city',$city)->whereBetween('price',[$priceMin,$priceMax])->whereBetween('numberOfRooms',[$roomsMin,$roomsMax])->whereBetween('surface',[$surfaceMin,$surfaceMax]);
            
             if(isset($input['buyCheck'])&&strcmp($input['buyCheck'],'on')==0&&isset($input['rentCheck'])&&strcmp($input['rentCheck'],'on')==0){
                $apartments = $apartments->get();
            }
            else if(isset($input['buyCheck'])&&strcmp($input['buyCheck'],'on')==0){
                $apartments = $apartments->where('transactionType','Sale')->get();
            }
            else if(isset($input['rentCheck'])&&strcmp($input['rentCheck'],'on')==0){
                $apartments = $apartments->where('transactionType','Rent')->get();
            }
            else return null;

            return $apartments;
        }
	}
?>
