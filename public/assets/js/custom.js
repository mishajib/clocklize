$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

function makeDeleteRequest(event, id) {
    event.preventDefault();
    Swal.fire({
        title              : 'Are you sure?',
        text               : "You will not be able to recover!",
        icon               : 'warning',
        showCancelButton   : true,
        confirmButtonColor : '#3085d6',
        cancelButtonColor  : '#d33',
        confirmButtonText  : 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            $('#delete-form-' + id).submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Your data is safe :)',
                'error'
            );
        }
    });
}

function makeApproveRequest(event, id) {
    event.preventDefault();
    swal({
        title              : "Are you sure?",
        text               : "You want to approve this!",
        type               : "warning",
        showCancelButton   : true,
        confirmButtonColor : "#DD6B55",
        confirmButtonText  : "Yes, approve it!",
        closeOnConfirm     : false,
        buttons            : {
            cancel  : true,
            confirm : true,
        },
        icon               : 'success'
    }).then((willDelete) => {
        if (willDelete) {
            let form_id = $('#approve-form-' + id);
            $(form_id).submit();
        }
    });
}

function makeAcceptRequest(event, route, id) {
    event.preventDefault();
    swal({
        title              : "Are you sure?",
        text               : "You want to accept this!",
        type               : "warning",
        showCancelButton   : true,
        confirmButtonColor : "#DD6B55",
        confirmButtonText  : "Yes, accept it!",
        closeOnConfirm     : false,
        buttons            : {
            cancel  : true,
            confirm : true,
        },
        icon               : 'success'
    }).then((willDelete) => {
        if (willDelete) {
            let form_id = $('#accept-form-' + id);
            $(form_id).submit();
        }
    });
}

function makeRejectRequest(event, id) {
    event.preventDefault();
    swal({
        title              : "Are you sure?",
        text               : "You want to reject this!",
        type               : "warning",
        showCancelButton   : true,
        confirmButtonColor : "#DD6B55",
        confirmButtonText  : "Yes, reject it!",
        closeOnConfirm     : false,
        buttons            : {
            cancel  : true,
            confirm : true,
        },
        icon               : 'success'
    }).then((willDelete) => {
        if (willDelete) {
            let form_id = $('#reject-form-' + id);
            $(form_id).submit();
        }
    });
}

function makeCompleteRequest(event, id) {
    event.preventDefault();
    swal({
        title              : "Are you sure?",
        text               : "You want to mark as complete this!",
        type               : "warning",
        showCancelButton   : true,
        confirmButtonColor : "#DD6B55",
        confirmButtonText  : "Yes, complete this!",
        closeOnConfirm     : false,
        buttons            : {
            cancel  : true,
            confirm : true,
        },
        icon               : 'success'
    }).then((willDelete) => {
        if (willDelete) {
            let form_id = $('#complete-form-' + id);
            $(form_id).submit();
        }
    });
}

function makePendingRequest(event, id) {
    event.preventDefault();
    swal({
        title              : "Are you sure?",
        text               : "You want to pending this!",
        type               : "warning",
        showCancelButton   : true,
        confirmButtonColor : "#DD6B55",
        confirmButtonText  : "Yes, pending it!",
        closeOnConfirm     : false,
        buttons            : {
            cancel  : true,
            confirm : true,
        },
        icon               : 'success'
    }).then((willDelete) => {
        if (willDelete) {
            let form_id = $('#pending-form-' + id);
            $(form_id).submit();
        }
    });
}

function logoutFunction() {
    event.preventDefault();
    Swal.fire({
        title              : 'Are you sure?',
        text               : "Want to logout!",
        icon               : 'warning',
        showCancelButton   : true,
        confirmButtonColor : '#3085d6',
        cancelButtonColor  : '#d33',
        confirmButtonText  : 'Yes, logout it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            $('#logout-form').submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Your session is safe :)',
                'error'
            );
        }
    });
}

$(document).on('click', '#login-request-btn', function (e) {
    e.preventDefault();
    let btn = $(this);
    let route = btn.data('route');
    let id = btn.data('id');

    Swal.fire({
        title              : 'Are you sure?',
        text               : "You want to login as this user!",
        icon               : 'warning',
        showCancelButton   : true,
        confirmButtonColor : '#3085d6',
        cancelButtonColor  : '#d33',
        confirmButtonText  : 'Yes, login!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();

            $.ajax({
                url     : route,
                method  : "POST",
                success : function (res) {
                    if (res.success == true) {
                        window.open("http://ozzy.lcl/admin", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,menubar=yes,fullscreen=yes");
                    }
                },
                error   : function (err) {
                    Swal.fire(
                        'Error!',
                        err.responseJSON.message,
                        'error'
                    )
                },
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Your session is safe :)',
                'error'
            );
        }
    });
});

// File manager Remove Selected Image
function setCharAt(str, index, chr) {
    if (index > str.length - 1) return str;
    return str.substring(0, index) + chr + str.substring(index + 1);
}

function removeImage(e) {
    $(e).parent().remove();
    var targetImage = $(e).attr("data-imageSrc");
    var targetInput = $(e).attr("data-imageInput");
    var old_input = $(`#${targetInput}`).val();
    var new_input = old_input.replace(targetImage, "").replace(',,', ',');
    if (new_input.charAt(0) === ',') {
        let replace_text = setCharAt(new_input, 0, "");
        $(`#${targetInput}`).val(replace_text);
    } else {
        $(`#${targetInput}`).val(new_input);
    }
}

function removeImageFromSelection(event, item) {
    event.preventDefault();
    Swal.fire({
        title              : 'Are you sure?',
        text               : "You will not be able to recover!",
        icon               : 'warning',
        showCancelButton   : true,
        confirmButtonColor : '#3085d6',
        cancelButtonColor  : '#d33',
        confirmButtonText  : 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            removeImage(item);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Your data is safe :)',
                'error'
            );
        }
    });
}

// Preview Input Image
function readInputImageURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $('#image_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }

    $('#image_holder').show();
}

$(document).ready(function () {
    $.widget.bridge('uibutton', $.ui.button);
    window.onload = function () {
        $('#overlay-loader').fadeOut(500, function () {
            $('#overlay-loader').hide();
        });
    };
});


