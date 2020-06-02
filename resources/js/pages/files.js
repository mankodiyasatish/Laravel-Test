var Files = function() {

    var handleSWAlerts = function() {
        $( "body" ).on( "click", ".delete-file-btn", function(e) {
            e.preventDefault();
            id = $(this).attr('data-id');
            Swal.fire({
                title: "Are you sure?",
                text: "You wish to delete this file!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger",
                cancelButtonClass: "btn btn-default",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.value) {
                    $('#delete-file').attr('action', $('#delete-file').attr('action')+'/'+id);
                    $('#delete-file').submit();
                }
            });
        });
    }

    var setTooltip = function(btn, message) {
        $(btn).tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
    }

    var hideTooltip = function(btn) {
        setTimeout(function() {
            $(btn).tooltip('hide');
        }, 1000);
    }

    var handleCopyLink = function() {

        $('.copy-btn').tooltip({
            trigger: 'click',
            placement: 'bottom'
        });

        var clipboard = new ClipboardJS('.copy-btn');

        clipboard.on('success', function(e) {
            setTooltip(e.trigger, 'Copied!');
            hideTooltip(e.trigger);
            e.clearSelection();
        });
    }

    return {
        //main function to initiate the module
        init: function() {
            handleSWAlerts();
            handleCopyLink();
        }

    };

}();

jQuery(document).ready(function() {
    Files.init();
});
