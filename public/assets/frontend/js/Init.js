//bootstarp modals
function largeModal(url, header) {
    $("#largeModal .modal-body").html("Loading...");
    $("#largeModal .modal-title").html("Loading...");

    $("#largeModal").modal("show");
    $.ajax({
        url: url,
        success: function (response) {
            $("#largeModal .modal-body").html(response);
            $("#largeModal .modal-title").html(header);
        },
    });
}

function smallModal(url, header) {
    $("#smallModal .modal-body").html("Loading...");
    $("#smallModal .modal-title").html("Loading...");

    $("#smallModal").modal("show");
    $.ajax({
        url: url,
        success: function (response) {
            $("#smallModal .modal-body").html(response);
            $("#smallModal .modal-title").html(header);
        },
    });
}

function confirmModal(delete_url, param) {
    $("#confirmModal").modal("show");
    callBackFunction = param;
    document.getElementById("delete_form").setAttribute("action", delete_url);
}

$(".ajaxDeleteForm").submit(function (e) {
    var form = $(this);
    ajaxSubmit(e, form, callBackFunction);
});

function closeModel() {
    //$('.modal .modal-body').html('');
    //$('.modal .modal-title').html('');
}

function closeConfirmModel() {
    $("#confirmModal").modal("hide");
}

//jquery validator
// function initValidate(selector) {
//     $(selector).validate({
//         errorElement: "div",
//         errorPlacement: function (error, element) {
//             error.addClass("invalid-feedback");
//             element.closest(".form-group").append(error);
//         },
//         highlight: function (element, errorClass, validClass) {
//             $(element).addClass("is-invalid");
//         },
//         unhighlight: function (element, errorClass, validClass) {
//             $(element).removeClass("is-invalid");
//         },
//     });
// }

function initValidate(selector) {
    $(selector).validate({
        errorElement: "div",
        errorPlacement: function (error, element) {
            // Remove any existing error messages within the form-group
            element.closest(".form-group").find(".invalid-feedback").remove();

            error.addClass("invalid-feedback");
            // Append error message only if it doesn't already exist
            if (element.closest(".form-group").find(".invalid-feedback").length === 0) {
                element.closest(".form-group").append(error);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
            $(element).closest(".form-group").addClass("has-error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).closest(".form-group").removeClass("has-error");
        }
    });
}

//select2
function initSelect2(selector) {
    $(selector).select2({
        // tags: true,
    });

    // $("select").on("select2:select", function (evt) {
    //     var element = evt.params.data.element;
    //     var $element = $(element);

    //     $element.detach();
    //     $(this).append($element);
    //     $(this).trigger("change");
    //   });
}

function initSelect3(selector) {
    $(selector).select2();
}

function initSelect4(selector) {
    $(selector).select2({
        sortResults: data => data.sort((a, b) => a.text.localeCompare(b.text)),
    });
}

/*------------------- form submit ajax new --------------------*/

function getCsrfToken() {
    return $.get("/csrf-token"); // An endpoint that returns a new CSRF token
}

// function ajax_form_submit(e, form, callBackFunction) {
//     if (form.valid()) {
//         e.preventDefault();
//         var btn = $(form).find('button[type="submit"]');
//         var btn_text = $(btn).html();
//         $(btn).html('please wait... <i class="las la-spinner la-spin"></i>');
//         $(btn).css("opacity", "0.7");
//         $(btn).css("pointer-events", "none");
//         var action = form.attr("action");
//         var data = new FormData(form[0]); // Corrected to form[0] to get the raw DOM element
//         $.ajax({
//             type: "POST",
//             url: action,
//             processData: false,
//             contentType: false,
//             dataType: "json",
//             data: data,
//             success: function (response) {
//                 resetButton(btn, btn_text);
//                 if (response.response_message.response === "success") {
//                     Command: toastr.success(
//                         response.response_message.message,
//                         "Success"
//                     );
//                     callBackFunction(response);
//                 } else {
//                     if (Array.isArray(response.response_message.message)) {
//                         var errors = "";
//                         $.each(
//                             response.response_message.message,
//                             function (key, msg) {
//                                 errors +=
//                                     "<div>" + (key + 1) + ". " + msg + "</div>";
//                             }
//                         );
//                         Command: toastr.error(errors, "Alert");
//                     } else {
//                         Command: toastr.error(
//                             response.response_message.message,
//                             "Alert"
//                         );
//                     }
//                 }
//             },
//             error: function (xhr, status, error) {
//                 resetButton(btn, btn_text);
//                 Command: toastr.error("An error occurred: " + error, "Error");
//             },
//         });
//     } else {
//         toastr.error("Please make sure to fill all the necessary fields");
//         resetButton($(form).find('button[type="submit"]'), btn_text);
//     }
// }

// function resetButton(btn, btn_text) {
//     $(btn).html(btn_text);
//     $(btn).css("opacity", "1");
//     $(btn).css("pointer-events", "inherit");
// }

function ajax_form_submit(e, form, callBackFunction) {
    if (form.valid()) {
        e.preventDefault();
        var btn = $(form).find('button[type="submit"]');
        var btn_text = $(btn).html();
        $(btn).html('please wait... <i class="las la-spinner la-spin"></i>');
        $(btn).css("opacity", "0.7");
        $(btn).css("pointer-events", "none");
        var action = form.attr("action");
        var data = new FormData(form[0]); // Corrected to form[0] to get the raw DOM element

        getCsrfToken()
            .done(function (response) {
                var token = response.token;
                data.append("_token", token);

                $.ajax({
                    type: "POST",
                    url: action,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    data: data,
                    success: function (response) {
                        resetButton(btn, btn_text);
                        if (response.response_message.response === "success") {
                            Command: toastr.success(
                                response.response_message.message,
                                "Success",
                                {
                                    closeButton: true,
                                    progressBar: true,
                                    tapToDismiss: false,
                                }
                            );
                            callBackFunction(response);
                        } else {
                            if (
                                Array.isArray(response.response_message.message)
                            ) {
                                var errors = "";
                                $.each(
                                    response.response_message.message,
                                    function (key, msg) {
                                        errors +=
                                            "<div>" +
                                            (key + 1) +
                                            ". " +
                                            msg +
                                            "</div>";
                                    }
                                );
                                Command: toastr.error(errors, "Alert", {
                                    closeButton: true,
                                    progressBar: true,
                                    tapToDismiss: false,
                                });
                            } else {
                                Command: toastr.error(
                                    response.response_message.message,
                                    "Alert",
                                    {
                                        closeButton: true,
                                        progressBar: true,
                                        tapToDismiss: false,
                                    }
                                );
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        resetButton(btn, btn_text);
                        Command: toastr.error(
                            "An error occurred: " + error,
                            "Error",
                            {
                                closeButton: true,
                                progressBar: true,
                                tapToDismiss: false,
                            }
                        );
                    },
                });
            })
            .fail(function () {
                resetButton(btn, btn_text);
                Command: toastr.error(
                    "Failed to retrieve CSRF token",
                    "Error",
                    {
                        closeButton: true,
                        progressBar: true,
                        tapToDismiss: false,
                    }
                );
            });
    } else {
        toastr.error(
            "Please make sure to fill all the necessary fields",
            "Error",
            {
                closeButton: true,
                progressBar: true,
                tapToDismiss: false,
            }
        );
        resetButton($(form).find('button[type="submit"]'), btn_text);
    }
}

function resetButton(btn, btn_text) {
    $(btn).html(btn_text);
    $(btn).css("opacity", "1");
    $(btn).css("pointer-events", "inherit");
}

/*------------------- form submit ajax new --------------------*/

//Form Submition
function ajaxSubmit(e, form, callBackFunction) {
    if (form.valid()) {
        e.preventDefault();

        var btn = $(form).find('button[type="submit"]');
        var btn_text = $(btn).html();
        $(btn).html('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>');
        $(btn).css("opacity", "0.7");
        $(btn).css("pointer-events", "none");

        var action = form.attr("action");
        var form = e.target;
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: "json",
            data: data,
            success: function (response) {
                $(btn).html(btn_text);
                $(btn).css("opacity", "1");
                $(btn).css("pointer-events", "inherit");

                if (response.status) {
                    Command: toastr["success"](
                        response.notification,
                        "Success",
                        {
                            closeButton: true,
                            progressBar: true,
                            tapToDismiss: false,
                        }
                    );
                    callBackFunction(response);
                } else {
                    if (typeof response.notification === "object") {
                        var errors = "";
                        $.each(response.notification, function (key, msg) {
                            errors +=
                                "<div>" + (key + 1) + ". " + msg + "</div>";
                        });
                        Command: toastr["error"](errors, "Alert", {
                            closeButton: true,
                            progressBar: true,
                            tapToDismiss: false,
                        });
                    } else {
                        Command: toastr["error"](
                            response.notification,
                            "Alert",
                            {
                                closeButton: true,
                                progressBar: true,
                                tapToDismiss: false,
                            }
                        );
                    }
                }
            },
        });
    } else {
        toastr.error(
            "Please make sure to fill all the necessary fields",
            "Error",
            {
                closeButton: true,
                progressBar: true,
                tapToDismiss: false,
            }
        );
    }
}

//trumbowyg Editor
function initTrumbowyg(target) {
    $(target).trumbowyg({
        btnsDef: {
            // Create a new dropdown
            image: {
                dropdown: ["insertImage", "upload"],
                ico: "insertImage",
            },
            // Define the heading button with different levels
            heading: {
                dropdown: ["h1", "h2", "h3", "h4", "h5", "h6"],
                ico: "pencil", // You can use an appropriate icon
            },
        },
        // Redefine the button pane
        btns: [
            ["viewHTML"],
            ["formatting"],
            ["strong", "em", "del"],
            ["superscript", "subscript"],
            ["link"],
            ["image"], // Our fresh created dropdown
            ["table"],
            ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
            ["unorderedList", "orderedList"],
            ["horizontalRule"],
            ["removeformat"],
            ["fullscreen"],
        ],
        plugins: {
            // Add imagur parameters to upload plugin for demo purposes
            upload: {
                serverPath:
                    $("#baseUrl").attr("href") + "/backend/trumbowyg/upload",
                fileFieldName: "image",
                headers: {},
                urlPropertyName: "file",
            },
            resizimg: true,
        },
    });
}
function destroyTrumbowyg(target) {
    $(target).trumbowyg("destroy");
}

// //footer script
// $(document).ready(function() {
//     initValidate('#add_footer_form');
//     $("#add_footer_form").submit(function(e) {
//         var form = $(this);
//         ajaxSubmit(e, form, responseHandler);
//     });

//     var responseHandler = function(response) {
//         $('input, textarea').val('');
//         $("select option:first").prop('selected', true);
//         setTimeout(function() {
//             window.location.href = $('#baseUrl').attr('href') + '/thank-you';
//         }, 2000);
//     }
// });

// //popup script
// $(document).ready(function() {
//     initValidate('#add_popup_form');
//     $("#add_popup_form").submit(function(e) {
//         var form = $(this);
//         ajaxSubmit(e, form, responseHandler);
//     });

//     var responseHandler = function(response) {
//         $('input, textarea').val('');
//         $("select option:first").prop('selected', true);
//         setTimeout(function() {
//             window.location.href = $('#baseUrl').attr('href') + '/thank-you';
//         }, 2000);
//     }
// });

// //comment script
// $(document).ready(function() {
//     initValidate('#add_comment_form');
//     $("#add_comment_form").submit(function(e) {
//         var form = $(this);
//         ajaxSubmit(e, form, responseHandler);
//     });

//     var responseHandler = function(response) {
//         $('input, textarea').val('');
//         $("select option:first").prop('selected', true);
//         setTimeout(function() {
//             location.reload();
//         }, 2000);
//     }
// });

// //have_Any_question_form
// $(document).ready(function() {
//     initValidate('#have_any_question_form');
//     $("#have_any_question_form").submit(function(e) {
//         var form = $(this);
//         ajaxSubmit(e, form, responseHandler);
//     });

//     var responseHandler = function(response) {
//         $('input, textarea').val('');
//         $("select option:first").prop('selected', true);
//         setTimeout(function() {
//             window.location.href = $('#baseUrl').attr('href') + '/thank-you';
//         }, 2000);
//     }
// });

// //Ask popup form
// $(document).ready(function() {
//     initValidate('#ask_popup_form');
//     $("#ask_popup_form").submit(function(e) {
//         var form = $(this);
//         ajaxSubmit(e, form, responseHandler);
//     });

//     var responseHandler = function(response) {
//         $('input, textarea').val('');
//         $("select option:first").prop('selected', true);
//         setTimeout(function() {
//             window.location.href = $('#baseUrl').attr('href') + '/thank-you';
//         }, 2000);
//     }
// });

// //Area practice form
// $(document).ready(function() {
//     initValidate('#area_practice_form');
//     $("#area_practice_form").submit(function(e) {
//         var form = $(this);
//         ajaxSubmit(e, form, responseHandler);
//     });

//     var responseHandler = function(response) {
//         $('input, textarea').val('');
//         $("select option:first").prop('selected', true);
//         setTimeout(function() {
//             window.location.href = $('#baseUrl').attr('href') + '/thank-you';
//         }, 2000);
//     }
// });
