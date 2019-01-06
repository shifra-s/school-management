
//on click recognizes all elements-including ones loading dynamically
$(document).on('click', '#delete-admin-btn', function () {
    var info = $(this).data('info');
    var token = $('meta[name="token"]').attr("content");
    console.log(info);
    swal({
        title: "Are you sure?",
        text: "This will delete admin " + info.name,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                console.log(token);
                $.post('/admin/delete/' + info.id, {'_token': token}, function (data) {
                    //json.parse is an internal js function
                    var parsed = JSON.parse(data);
                    if (parsed.status === 'success') {
                        $('#admin-' + parsed.id).remove(); //deletes the html from the page by identifying the specific admin with the admin id
                        if (parsed.remaining == 0) { //seems to be ignoring this line.. deleting the admin before even going into this condition
                            $('#admin-table').html("<strong><No Admins found</strong>")
                        }
                        swal("Okay, the administrator " + info.name + " has been deleted!", {
                            icon: "success",
                        });
                        $('#admin-details-section').hide();
                        $('#admin-count').show();
                    } else {
                        swal("Something went wrong", {icon: "error"});
                    }
                });
            } else {
                swal("Admin is safe");
            }
        });
});


