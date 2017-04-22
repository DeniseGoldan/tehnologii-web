function validateRegisterForm() {
	var validator = $("#registerForm").validate({
		errorClass: "my-error-class",
		rules: {
			desiredUsername: {
				required: true,
				minlength: 3,
				maxlength: 50
			},
			firstName: {
				required: true,
				minlength: 3,
				maxlength: 50
			},
			lastName: {
				required: true,
				minlength: 3,
				maxlength: 50
			},
			desiredPassword: {
				required: true,
				minlength: 8,
				maxlength: 50
			},
			confirmPassword: {
				required: true,
				equalTo: "#desiredPassword",
				minlength: 8,
				maxlength: 50
			},
			phoneNumber: {
				required: true,
				minlength: 10,
				maxlength: 20
			},
			email: {
				required: true,
				minlength: 3,
				maxlength: 50
			}
		},
		messages: {
			desiredUsername: {
				minlength: "You need to insert at least 3 characters."
			},
			firstName: {
				minlength: "You need to insert at least 3 characters."
			},
			lastName: {
				minlength: "You need to insert at least 3 characters."
			},
			desiredPassword: {
				minlength: "Password must have at least 8 characters."
			},
			confirmPassword: {
				equalTo: "The two passwords must match!",
			},
			phoneNumber: {
				minlength: "You need to insert at least 10 characters."
			}
		}
	});
}
