var studentNameError = $('#student-error-name');
var studentPhoneError = $('#student-error-number');
var studentEmailError = $('#student-error-email');
var studentImageError = $('#student-error-image');


var courseNameError = $('#course-error-name');
var courseDescriptionError = $('#course-error-description');
var courseImageError = $('#student-error-image');


//validate student form on submit
function studentFormValidation() {

    resetStudentFormValidations();

    let formValidated = true;

    if ($('#student-name').val().length < 3) {
        $('#student-error-name').html('name cannot be that short');
        formValidated = false;
    }

    let numberReg = /[0-9]/;
    if (!numberReg.test($('#student-number').val())) {
        $('#student-error-number').html('please enter a valid phone number');
        formValidated = false;
    }

    let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailReg.test($('#student-email').val())) {
        $('#student-error-email').html('please enter a valid email address');
        formValidated = false;
    }

    /* if ($('#student-img') == null) {
         $('#student-error-image').html('make sure you upload a file');
     } */

    if (!imageValidation()) {
        $('#student-error-image').html('make sure you upload a file');
        return false;
    }

    if (!formValidated) {
        return false;
    } else {
        return true;
    }

}


function imageValidation() {
    console.log('img check');
    window.URL = window.URL || window.webkitURL;

    let fileInput = $('#student-img').find("input[type=file]")[0],
        file = fileInput.files && fileInput.files[0];

    if (file) {
        let img = new Image();

        img.src = window.URL.createObjectURL(file);

        img.onload = function () {
            let width = img.naturalWidth,
                height = img.naturalHeight;

            window.URL.revokeObjectURL(img.src);

            if (width == 400 && height == 300) {
                return true;
            } else {
                return false;
            }
        }
    }
}


//reset student form validation error messages
function resetStudentFormValidations() {
    studentNameError.html('');
    studentPhoneError.html('');
    studentEmailError.html('');
    studentImageError.html('');
}

//reset course form validation error mesages
function resetCourseFormValidations() {
    courseNameError.html('');
    courseDescriptionError.html('');
    courseImageError.html('');
}


//validate course form
$('#course-validation').submit(function (e) {

    resetCourseFormValidations();

    let formValidated = true;

    if ($('#course-name').val().length < 3) {
        $('#course-error-name').html('name cannot be that short');
        formValidated = false;
    }

    if (formValidated) {
        return true;
    } else {
        return false;
    }

});

//validate admin form

$('#admin-validation').submit(function () {

    let formValidated = true;

    if ($('#admin-name').val().length < 3) {
        alert('name cannot be that short');
        formValidated = false;
    }

    let numberReg = /[0-9]/;
    if (!numberReg.test($('#admin-number').val())) {
        alert('you need to enter a valid phone number');
        formValidated = false;
    }

    let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailReg.test($('#admin-email').val())) {
        alert('you need to enter a valid email address');
        formValidated = false;
    }

    let strongPwdReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
    if (!strongPwdReg.test($('#admin-pwd').val())) {
        alert('your password must be at least eight characters long, include an uppercase and lowercase letter, a special character, and a digit!');
        formValidated = false;
    }

    if (formValidated == false) {
        // fix this up - look at other code
        return false;
    }
});


