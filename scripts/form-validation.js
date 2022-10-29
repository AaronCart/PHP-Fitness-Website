// jQuery JavaScript used to validate the Contact form.
$(document).ready(function () {

    $("form[name='contactUs']").validate({

        rules: {
            homeaddress: "required",
            email: {
                required: true,
                email: true
            },
            message: "required"
        },

        messages: {
            homeaddress: "Please enter your address",
            email: "Please enter a valid email address",
            message: "Please type in your query"
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
});