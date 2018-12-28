//validate student form
$('#student-validation').submit(function(){

    let formValidated = true;
    
    if($('#student-name').val().length < 3) {
        alert('name cannot be that short');
        formValidated = false;
    };
    
    var numberReg = /[0-9]/;
    if(!numberReg.test($('#student-number').val())) {
        alert('you need to enter a valid phone number');
        formValidated = false;
    };
    
    var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailReg.test($('#student-email').val())) {
        alert('you need to enter a valid email address');
        formValidated = false;
    }
    
    if(formValidated == false) {
        // fix this up - look at other code
        return false;
    }
});


//validate course form



//validate admin form

$('#admin-validation').submit(function(){

    let formValidated = true;
    
    if($('#admin-name').val().length < 3) {
        alert('name cannot be that short');
        formValidated = false;
    };
    
    var numberReg = /[0-9]/;
    if(!numberReg.test($('#admin-number').val())) {
        alert('you need to enter a valid phone number');
        formValidated = false;
    };
    
    var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailReg.test($('#admin-email').val())) {
        alert('you need to enter a valid email address');
        formValidated = false;
    }
    
    var pwdReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
    if (!pwdReg.test($('#admin-pwd').val())) {
        alert('your password must be at least eight characters long, include an uppercase and lowercase letter, a special character, and a digit!');
        formValidated = false;
    }
    if(formValidated == false) {
        // fix this up - look at other code
        return false;
    }
});


var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
