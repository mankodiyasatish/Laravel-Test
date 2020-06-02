var CreateFiles = function() {

    var handleValidation = function() {

        var createFileForm = $('#upload-files');

        $.validator.addMethod("customFileValidation", function (value, element) {

            var success = false;

            notAllowedTypes = ['exe', 'bmp', 'php'];

            fileName = value.split('.');

            if($.inArray(fileName[1], notAllowedTypes) < 0) {
                success = true;
            }

            return success;

        }, 'Please select file except .exe, .bmp or .php.');

        $.validator.addMethod('filesize', function (value, element, param) {
            fileSize = element.files[0].size / 1024 / 1024;
            return this.optional(element) || (fileSize <= param);
        }, 'File size must be less than {0}');

        createFileForm.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                file: {
                    required: true,
                    customFileValidation: true,
                    filesize: 10
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                file: {
                    required: "Please select Files.",
                    customFileValidation: "Please select file except .exe, .bmp or .php.",
                    filesize: "File size must be less than 10 MB."
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

    var handleFileUpload = function() {
        $(document).on('change.bs.fileinput', '.custom-file input', function(e) {

            var $this = $(this),
                $input = $(this),
                $span = $('.custom-file-label');

            if($input[0].files !== undefined && $input[0].files.length > 1) {
                $span.addClass('dropdown').html('<a href="#" data-toggle="dropdown" class="dropdown-toggle">multiple files selected <i class="caret"></i></a><ul class="dropdown-menu file-select-menu" role="menu"><li>' + $.map($input[0].files, function(val) { return val.name; }).join('</li><li>') + '</li></ul>');
            }
            else
            {
                var files = [];

                for (var i = 0; i < $(this)[0].files.length; i++) {
                    files.push($(this)[0].files[i].name);
                }

                $(this).parent().find('.custom-file-label').html(files.join(', '));
            }
        });
    }

    return {
        //main function to initiate the module
        init: function() {
            handleValidation();
            handleFileUpload();
        }

    };

}();

jQuery(document).ready(function() {
    CreateFiles.init();
});
