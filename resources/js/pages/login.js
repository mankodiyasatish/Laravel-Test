var Login = function() {
    var handleValidation = function() {

        var loginForm = $('#login');

        loginForm.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                email: {
                    required: "Please enter Email Address.",
                    email: "Please enter valid Email Address."
                },
                password: {
                    required: "Please enter Password.",
                    minlength: "Password must be 6 characters long."
                }
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("data-error-container")) {
                    error.appendTo('#'+element.attr("data-error-container"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            }
        });
    }

    return {
        //main function to initiate the module
        init: function() {
            handleValidation();
        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});
