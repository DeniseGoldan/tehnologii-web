<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add property</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="add_property_styles.css">
	<!--Bootstrap elements needed-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="add_propriety.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places&callback=initialize" async defer></script>
</head>
<body>
	<div class="container">
		<form class="well" method="post">
			<!--Define the location of the property-->
			<fieldset>
				<legend>Location</legend>
				<div class="input-group required">
					<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
					<input name="search" placeholder="Enter a city" id="city" class="form-control" type="text">
				</div>
				<div id="googleMap" style="width:100%;height:400px;"></div>
			</fieldset>
			<br>
			<!--Select the type of property-->
			<fieldset>
				<legend>Property type</legend>
				<div class="form-group required">
					<div class="radio">
						<label><input type="radio" name="propertyType">House</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="propertyType">Apartment</label>
					</div>
				</div>
			</fieldset>
			<br>
			<!--Details about property-->
			<fieldset>
				<legend>Add information about property</legend>
				<div class="form-group">
					<div class="input-group required">
						<input type="text" class="form-control" name="propertyNumberOfRooms" placeholder="Number of rooms">
					</div>
					<div class="input-group required">
						<input type="text" class="form-control" name="propertySurface" placeholder="Surface">
					</div>
					<div class="input-group required">
						<input type="text" class="form-control" name="propertyFloor" placeholder="Floor">
					</div>
				</div>
			</fieldset>
			<!--Select if the property is for sale or for rent-->
			<fieldset>
				<legend>Transaction type</legend>
				<div class="form-group required">
					<div class="radio">
						<label><input type="radio" name="propertyTransactionType">Rent</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="propertyTransactionType">Sale</label>
					</div>
				</div>
			</fieldset>
			<br>
			<!--Select currency and set a price-->
			<fieldset>
				<legend>Set a price</legend>
				<div class="form-group">
					<div class="input-group required">
						<input type="text" class="form-control" name="propertyPrice" placeholder="Price">
					</div>
					<div class="input-group required">
						<input type="text" class="form-control" name="propertyCurrency" placeholder="Currency">
					</div>
				</div>
			</fieldset>
			<!--Submit data for further validation-->
			<button type="submit" name="submitButton">Submit</button>
		</form>
	</div>

<script>
document.getElementById('city').addEventListener('submit',recenterMap)
</script>




	</body>
	</html>
