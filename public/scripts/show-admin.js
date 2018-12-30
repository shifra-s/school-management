$('.admin').click(function () { //api with jquery
    let adminId = $(this).data('id');

    $.get('/admin/' + adminId, function (data) {

        if (data) {
            //when we receive the data, display the data (when an admin is clicked)
            $('#admin-details-section').html(data);
            displayAdminSection();

            //this makes the edit button work bc its part of what is coming from the server. ONLY after we show the admins can we call the function on the edit button
            $('.admin-edit').click(function () {
                let adminId = $(this).data('id');
                //var form = $('#edit-admin-form');
                $.get('admin/edit/' + adminId, function (data) {
                    //replace the main container with the form
                    $('#admin-details-section').html(data);
                    displayAdminSection();
                });
            });

        } else {
            alert('Invalid admin id');
        }
    });
});

function displayAdminSection() {
    $('#admin-count').hide();
    $('#add-admin-form').hide();
    $('#admin-details-section').show();
}