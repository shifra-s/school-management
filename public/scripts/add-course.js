
$('#add-course').click(function(){

    //reset the error messages in case the user didn't try to submit and the messages remain
    resetCourseFormValidations();

    $('#general-info-school').hide();
    $('#add-student-form').hide();
    $('#student-details-section').hide();
    $('#add-course-form').show();

});



