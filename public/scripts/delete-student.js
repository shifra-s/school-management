//$('#delete-student-btn')// this works only on the elements which loaded with the page but not for the elementnts which created dynamically

//on click recognizes all elements-including ones loading dynamically
$(document).on('click', '#delete-student-btn', function () {
    var info = $(this).data('info');
    var token = $('meta[name="token"]').attr("content");
    swal({
        title: "Are you sure?",
        text: "This will delete student " + info.name,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                //console.log(token);
                $.post('/student/delete/' + info.id, {'_token': token}, function (data) {
                    //json.parse is an internal js function
                    var parsed = JSON.parse(data);
                    if (parsed.status === 'success') {
                        $('#student-' + parsed.id).remove(); //deletes the html from the page by identifying the specific student with the student id
                        if (parsed.remaining == 0) { //seems to be ignoring this line.. deleting the student before even going into this condition
                            $('#student-table').html("<strong><No Students found</strong>")
                        }
                        swal('Okay, ' + info.name + ' has been deleted!', {
                            icon: "success",
                        });
                        $('#student-details-section').hide();
                        $('#general-info-school').show();
                    } else {
                        swal("Something went wrong", {icon: "error"});
                    }
                });
            } else {
                swal("Student is safe");
            }
        });
});