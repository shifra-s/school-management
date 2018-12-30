var studentNameError = $('#student-error-name');
var studentPhoneError = $('#student-error-number');
var studentEmailError = $('#student-error-email');
var studentImageError = $('#student-error-image');


var courseNameError = $('#course-error-name');
var courseDescriptionError = $('#course-error-description');
var courseImageError = $('#course-error-image');

//reset student form validation error messages
function resetStudentFormValidations() {
    studentNameError.html('');
    studentPhoneError.html('');
    studentEmailError.html('');
    studentImageError.html('');
}

//reset course form validation error messages
function resetCourseFormValidations() {
    courseNameError.html('');
    courseDescriptionError.html('');
    courseImageError.html('');
}

//validate student form on submit
function studentFormValidation() {

    resetStudentFormValidations();

    let formValidated = true;

    let name = $('#student-name').val();
    let number = $('#student-number').val();
    let email = $('#student-email').val();
    let img = $('#student-img').val();

    if (name.length < 3) {
        studentNameError.html('name cannot be that short');
        formValidated = false;
    }

    if (!name) {
        studentNameError.html('please enter a student name');
        formValidated = false;
    }

    let numberReg = /0[1-9]{1,2}-?[0-9]{3}-?[0-9]{4}$/;
    if (!numberReg.test(number)) {
        studentPhoneError.html('please enter a valid Israeli phone number');
        formValidated = false;
    }

    if (!number) {
        studentPhoneError.html('please enter a phone number');
        formValidated = false;
    }

    let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailReg.test(email)) {
        studentEmailError.html('please enter a valid email address');
        formValidated = false;
    }

    if (!email) {
        studentEmailError.html('please enter an email address');
        formValidated = false;
    }

    if (!img) {
        studentImageError.html('upload an image!');
        return false;
    }

    // if (!imageValidation()) {
    //     studentImageError.html('make sure you upload a file');
    //     formValidated = false;
    // }

   return formValidated;
}


function imageValidation() {
    console.log('img check');
    window.URL = window.URL || window.webkitURL;

    let imageIsValid = true;

    let fileInput = $('#student-img').find("input[type=file]")[0],
        file = fileInput.files && fileInput.files[0];

    if (!file) {
        imageIsValid = false;
    }

    if (file) {
        let img = new Image();

        img.src = window.URL.createObjectURL(file);

        img.onload = function () {
            let width = img.naturalWidth,
                height = img.naturalHeight;

            window.URL.revokeObjectURL(img.src);

            if (width < 10 || width > 2000 || height < 10 || height > 2000) {
                imageIsValid = false;
            }
        }
    }
    return imageIsValid;
}


//validate course form
function courseFormValidation() {

    resetCourseFormValidations();

    let name = $('#course-name').val();
    let description = $('#course-description').val();
    let img = $('#course-img').val();

    let formValidated = true;

    if (name.length < 3) {
        courseNameError.html('name cannot be that short');
        formValidated = false;
    }

    if (!name) {
        courseNameError.html('please enter a course name');
        formValidated = false;
    }

    if (description.length >500) {
        courseDescriptionError.html('the course description cannot exceed 500 characters');
        formValidated = false;
    }

    if(!description) {
        courseDescriptionError.html('please enter a course description');
        formValidated = false;
    }

    if (!img){
        courseImageError.html('please upload a course image');
        formValidated = false;
    }

    return formValidated;
}

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


