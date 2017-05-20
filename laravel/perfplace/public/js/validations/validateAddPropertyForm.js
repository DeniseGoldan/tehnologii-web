function validateAddPropertyForm() {
	var validator = $("#addPropertyForm").validate({
		errorClass: "my-error-class",
		rules: {
			title: {
				required: true,
				minlength: 5,
				maxlength: 100
			},
			description: {
				required: true,
				minlength: 10,
				maxlength: 1000
			},
			numberOfRooms: {
				required: true, 
				min: 1, 
				max: 10000000000
			},
			surface: {
				required: true,
				min: 10, 
				max: 10000000000
			},
			latitude: {
				required: true,
				min: -85.05115, 
				max: 85
			},
			longitude: {
				required: true,
				min: -180, 
				max: +180
			}
		},
		messages: {
			propertyPrice: {
				minlength: "You must insert at least 1 character."
			}
		}
	});
}
