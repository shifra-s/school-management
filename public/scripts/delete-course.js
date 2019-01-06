//on click recognizes all elements-including ones loading dynamically
$(document).on('click', '#delete-course-btn', function () {
    var info = $(this).data('info');
    var token = $('meta[name="token"]').attr("content");
    console.log(info);
    swal({
        title: "Are you sure?",
        text: "This will delete the " + info.name + " course",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                console.log(token);
                $.post('/course/delete/' + info.id, {'_token': token}, function (data) {
                    //json.parse is an internal js function
                    var parsed = JSON.parse(data);
                    if (parsed.status === 'success') {
                        $('#course-' + parsed.id).remove(); //deletes the html from the page by identifying the specific course with the course id
                        if (parsed.remaining == 0) { //seems to be ignoring this line.. deleting the course before even going into this condition
                            $('#course-table').html("<strong><No courses found</strong>")
                        }
                        swal("Okay, the " + info.name + " course has been deleted!", {
                            icon: "success",

                        });

                        //replace main container with the general info

                        $('#student-details-section').hide();
                        $('#general-info-school').show();
                    } else {
                        swal("Something went wrong", {icon: "error"});
                    }
                });
            } else {
                swal("The course is safe");
            }
        });
});