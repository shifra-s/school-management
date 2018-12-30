$('.course').click(function () { //api with jquery
    var courseId = $(this).data('id');
    console.log('you clicked on the course....now what?')

    $.get('/course/' + courseId, function (data) {

        if (data) {
            console.log(data);
            //when we receive the data, display the data (when a course is clicked)
            $('#student-details-section').html(data);
            displayDetailsSection();

            //this makes the edit button work bc its part of what is coming from the server. ONLY after we show the students can we call the function on the edit button
            $('.course-edit').click(function () {
                let form = $('#edit-course-form');
                $.get('/course/edit/' + courseId, function (data) {
                    $('#student-details-section').html(data);//replace the main container with the form
                    displayDetailsSection();
                })
                $('#student-details-section').html(form);
                displayDetailsSection();
                //show the form (default is display none)
                form.show();

            });

        } else {
            alert('Invalid course id');
        }
    });
});

function displayDetailsSection() {
    $('#general-info-school').hide();
    $('#add-student-form').hide();
    $('#add-course-form').hide();
    $('#student-details-section').show();
}