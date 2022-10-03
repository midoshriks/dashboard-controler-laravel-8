
/**
* Theme: Moltran Admin Template
* Author: Coderthemes
* SweetAlert -
* Usage: $.SweetAlert.methodname
*/

!function ($) {
    "use strict";

    var SweetAlert = function () { };

    //examples
    SweetAlert.prototype.init = function () {

        //Basic
        $('#sa-basic').click(function () {
            swal("Here's a message!");
        });

        //A title with a text under
        $('#sa-title').click(function () {
            swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis")
        });

        //Success Message
        $('#sa-success').click(function () {
            swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis", "success")
        });

        //Warning Message
        $('#sa-warning').click(function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        });

        //Parameter
        $('#sa-params').click(function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });

        //Parameter
        $('body').on('click', '.btn-delet', function () {
            let form_id = $(this).data('form-id');
            let name_val = $(this).data('name-item');
            new Swal({
                title: "Are you sure?",
                text: "You will not be able to recover this lorem ipsum!",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
            }).then(result => {
                if (result.value) {
                    $('#' + form_id).submit();
                    new Swal("Deleted!", "Your imaginary file has been deleted." + name_val, "success");
                } else {
                    new Swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
                // swal.closeModal();
            });

        });

        //Parameter
        $('.btn-active').click(function () {
            let form_id = $(this).data('form-id');
            let name_val = $(this).data('name-item');
            let self = $(this);

            new Swal({
                title: "Are you sure?",
                text: "You will not be able to recover this lorem ipsum!",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
            }).then(result => {
                if (result.value) {
                    $('#' + form_id).submit();
                    swal("Active User !", "Your imaginary file has been actived." + name_val, "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe " + name_val, "error");
                }
                // swal.closeModal();
            });
        });


        //Custom Image
        $('#sa-image').click(function () {
            swal({
                title: "Sweet!",
                text: "Here's a custom image.",
                imageUrl: "assets/sweet-alert/thumbs-up.jpg"
            });
        });

        //Auto Close Timer
        $('#sa-close').click(function () {
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            });
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

    //initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);
