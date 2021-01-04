$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});





function setSwalAlert(mode,title,text) {
    Swal.fire({
        icon: mode,
        title: title,
        text: text,
    })
}

function setNotifyAlert(msg,mode) {
    $.notify(msg, mode);
}
