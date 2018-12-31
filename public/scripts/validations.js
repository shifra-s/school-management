var studentNameError = $('#student-error-name');
var studentPhoneError = $('#student-error-number');
var studentEmailError = $('#student-error-email');
var studentImageError = $('#student-error-image');


var courseNameError = $('#course-error-name');
var courseDescriptionError = $('#course-error-description');
var courseImageError = $('#course-error-image');


var adminNameError = $('#admin-error-name');
var adminRoleError = $('#admin-error-role');
var adminNumberError = $('#admin-error-number');
var adminEmailError = $('#admin-error-email');
var adminPasswordError = $('#admin-error-password');
var adminImageError = $('#admin-error-image');


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

//reset course form validation error messages
function resetAdminFormValidations() {
    adminNameError.html('');
    adminRoleError.html('');
    adminNumberError.html('');
    adminEmailError.html('');
    adminPasswordError.html('');
    adminImageError.html('');
}

//validate student form on submit
function studentFormValidation() {

    resetStudentFormValidations();

    let formValidated = true;

    let studentName = $('#student-name').val();
    let studentNumber = $('#student-number').val();
    let studentEmail = $('#student-email').val();
    let studentImage = $('#student-img').val();

    let nameReg = /^[a-z][a-z '-.,]{2,30}$|^$/;
    if (!nameReg.test(studentName)) {
        studentNameError.html('the student\'s name must be between 3-30 characters');
        formValidated = false;
    }

    if (!studentName) {
        studentNameError.html('please enter a student name');
        formValidated = false;
    }

    let numberReg = /0[1-9]{1,2}-?[0-9]{3}-?[0-9]{4}$/;
    if (!numberReg.test(studentNumber)) {
        studentPhoneError.html('please enter a valid Israeli phone number');
        formValidated = false;
    }

    if (!studentNumber) {
        studentPhoneError.html('please enter a phone number');
        formValidated = false;
    }

    let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailReg.test(studentEmail)) {
        studentEmailError.html('please enter a valid email address');
        formValidated = false;
    }

    if (!studentEmail) {
        studentEmailError.html('please enter an email address');
        formValidated = false;
    }

    if (!studentImage) {
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

    let courseName = $('#course-name').val();
    let courseDescription = $('#course-description').val();
    let courseImage = $('#course-img').val();

    let formValidated = true;

    let nameReg = /^[a-z][a-z '-.,]{2,20}$|^$/;
    if (!nameReg.test(courseName)){
        courseNameError.html('the course name must be between 3-20 characters');
        formValidated = false;
    }

    if (!courseName) {
        courseNameError.html('please enter a course name');
        formValidated = false;
    }

    if (courseDescription.length >500) {
        courseDescriptionError.html('the course description cannot exceed 500 characters');
        formValidated = false;
    }

    if(!courseDescription) {
        courseDescriptionError.html('please enter a course description');
        formValidated = false;
    }

    if (!courseImage){
        courseImageError.html('please upload a course image');
        formValidated = false;
    }

    return formValidated;
}

//validate admin form

function adminFormValidation() {

    resetAdminFormValidations();

    let adminName = $('#admin-name').val();
    let adminRole = $('#admin-role').val();
    let adminNumber = $('#admin-number').val();
    let adminEmail = $('#admin-email').val();
    let adminPassword = $('#admin-pwd').val();
    let adminImage = $('#admin-img').val();

    let formValidated = true;

    let nameReg = /^[a-z][a-z '-.,]{2,40}$|^$/;
    if (!nameReg.test(adminName)){
        adminNameError.html('please enter a name between 3-40 characters');
        formValidated = false;
    }

    if (!adminName) {
        adminNameError.html('please enter the admin\'s name');
        formValidated = false;
    }

    if(!adminRole) {
        adminRoleError.html('please assign a role for the admin: owner[1], manager[2], or sales[3])')
    }

    let numberReg =  /0[1-9]{1,2}-?[0-9]{3}-?[0-9]{4}$/;
    if (!numberReg.test(adminNumber)) {
        adminNumberError.html('you need to enter a valid Israeli phone number');
        formValidated = false;
    }

    if (!adminNumber) {
        adminNumberError.html('please enter the admin\'s phone number');
        formValidated = false;
    }

    let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailReg.test(adminEmail)) {
        adminEmailError.html('you need to enter a valid email address');
        formValidated = false;
    }

    if (!adminEmail) {
        adminEmailError.html('please make sure to enter an email address');
        formValidated = false;
    }

    let strongPwdReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
    if (!strongPwdReg.test(adminPassword)) {
        adminPasswordError('your password must be at least eight characters long, include an uppercase and lowercase letter, a special character, and a digit!');
        formValidated = false;
    }

    if (!adminPassword) {
        adminPasswordError.html('please make sure to enter a password');
        formValidated = false;
    }

    if (!adminImage) {
        adminImageError.html('please make sure to upload a photo of the admin');
        formValidated = false;
    }

    return formValidated;

}


