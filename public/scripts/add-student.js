
$('#add-student').click(function(){

    //reset the error messages in case the user didn't try to submit and the messages remain
    resetStudentFormValidations();

    $('#general-info-school').hide();
    $('#add-course-form').hide();
    $('#student-details-section').hide();
    $('#add-student-form').show();
    //replace the main container with the form
    //show the form (default is display none)

});



