$(document).on('click', '.delete-button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
            title: "Are you sure you want to delete this property?" + id,
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                type: "DELETE",
                url: '/properties/'+id,
                data: {id:id},
                success: function (data) {
                        
                }         
            });
    });
});