$('#add-admin').click(function(){
    let form = $('#add-admin-form');
    //replace the main container with the form
    $('#main-info-wrapper-admins').html(form);
    //show the form (default is display none)
    form.show();

});


