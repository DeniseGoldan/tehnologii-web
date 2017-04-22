function validateAddPropertyForm() {
	var validator = $("#addPropertyForm").validate({
		errorClass: "my-error-class",
		rules: {
			propertyPrice: {
				required: true,
				minlength: 1,
				maxlength: 50
			}
		},
		messages: {
			propertyPrice: {
				minlength: "You must insert at least 1 character."
			}
		}
	});
}
