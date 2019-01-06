$('.student').click(function () { //api with jquery
    var studentId = $(this).data('id');
    console.log(studentId);
    $.get('/student/' + studentId, function (data) {

        if (data) {
            //when we receive the data, display the data (when a student is clicked)
            $('#student-details-section').html(data);
            displayDetailsSection();

            //this makes the edit button work bc its part of what is coming from the server. ONLY after we show the students can we call the function on the edit button
            $('.student-edit').click(function () {
                let studentId = $(this).data('id');
                var form = $('#edit-student-form');
                $.get('student/edit/' + studentId, function (data) {
                    //replace the main container with the form
                    $('#student-details-section').html(data);
                    displayDetailsSection();
                });
            });

        } else {
            alert('Invalid student id');
        }
    });
});

function displayDetailsSection() {
    $('#general-info-school').hide();
    $('#add-student-form').hide();
    $('#add-course-form').hide();
    $('#student-details-section').show();
}