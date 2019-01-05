//error messages used in multiple functions below

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

function fileValidation(imageId, imageError) {

    if (!imageId.val()) {
        imageError.html("please upload an image");
        return false;
    }

    let fileInput = imageId[0].files[0];
    console.log(fileInput)
    let extension = fileInput.type;

    if (fileInput.size > 2000000) {
        imageError.html("file size is too large");
        return false;
    } else if (extension !== "image/gif" && extension !== "image/jpeg" && extension !== "image/jpg" && extension !== "image/png") {
        imageError.html('enter correct file type');
        return false;
    } else if (!checkImgDimension(fileInput)) {
        return false;
    } else {
        return true;
    }
}

function checkImgDimension(fileInput, imageError) {
    let img = new Image();
    img.src = window.URL.createObjectURL(fileInput);

    img.onload = function () {
        let width = img.naturalWidth,
            height = img.naturalHeight;

        console.log(width);
        console.log(height);

        window.URL.revokeObjectURL(img.src);

        if (width < 100 || width > 2000 || height < 100 || height > 2000) {
            imageError.html('image dimensions must have a width of 100-2000 and a height of 100-2000')
            return false;
        }
        return true;
    }
}

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
    let studentImage = $('#student-img');

    let imageError = studentImageError;

    //let nameReg = /^[a-z]*([' ']?[a-z]*)?$/; check why this doesn't work. it sort of does...
    let nameReg = /[a-z]*$/
    if (!nameReg.test(studentName)) {
        studentNameError.html('enter letters only please');
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

    if (fileValidation(studentImage, imageError)) {
        return false;
    }

   return formValidated;
}

//validate course form
function courseFormValidation() {

    resetCourseFormValidations();

    let courseName = $('#course-name').val();
    let courseDescription = $('#course-description').val();
    let courseImage = $('#course-img');

    let imageError = courseImageError;

    let formValidated = true;

    let nameReg = /[a-z]*$/
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

    if (fileValidation(courseImage, imageError)) {
        return false;
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
    let adminImage = $('#admin-img');

    let imageError = adminImageError;

    let formValidated = true;

    let nameReg = /[a-z]*$/
    if (!nameReg.test(adminName)){
        adminNameError.html('enter a real name please');
        formValidated = false;
    }

    if (!adminName) {
        adminNameError.html('please enter the admin\'s name');
        formValidated = false;
    }

    if(adminRole == '') {
        adminRoleError.html('please assign a role for the admin')
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

    //let strongPwdReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
    let weakPwdReg = /[\w\d]{4,8}/;
    if (!weakPwdReg.test(adminPassword)) {
        adminPasswordError.html('your password must be at least eight characters long, include an uppercase and lowercase letter, a special character, and a digit!');
        formValidated = false;
    }

    if (!adminPassword) {
        adminPasswordError.html('please make sure to enter a password');
        formValidated = false;
    }

    if (fileValidation(adminImage, imageError)) {
        return false;
    }

    return formValidated;

}


