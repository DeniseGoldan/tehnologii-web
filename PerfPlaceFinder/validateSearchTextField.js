function validateSearchTextField() {
	var validator = $("#searchForm").validate({
		errorClass: "my-error-class",
		rules: {
			searchTextField: {
				required: true,
				minlength: 2,
				maxlength: 150
			}
		},
		messages: {
			searchTextField: {
				minlength: "You need to insert at least 2 characters."
			}
		}
	});
}
