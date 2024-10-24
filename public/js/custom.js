// function openOTPmodal() {
//     window.location.href = '{{url("otpverification")}}';
// }

// function onOTPverification() {
//     alert("OTP Verified Successfully. Please Login")
// }

$(document).ready(function () {
    $("#navbar-search-input").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable td").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

