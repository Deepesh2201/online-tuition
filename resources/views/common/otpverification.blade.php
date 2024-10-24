<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FOI App Landing Page</title>
    <link rel="stylesheet" href="vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <title>OTP Verification</title>
</head>

<body>

    <div class="card mb-3" style="max-width: 35rem; margin:150px auto;">
        <div class="card-header bg-primary text-white">An OTP has been sent to your given email Id.</div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">OTP<i style="color:red">*</i></label>
                        <input type="text" class="form-control" id="registrationOTP" placeholder="Please enter OTP">
                    </div>

                </div>

                <a href="{{url('/')}}" type="submit" role="button" class="btn btn-primary float-right" href="index.html"
                    >Submit</a>

                <div id="confirmation" hidden>

                </div>
            </form>
        </div>
    </div>

    <!-- hsgjh -->
    <!-- <div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title text-info" id="exampleModalLabel">OPT has been sent to your given email Id.
                    </p>
                </div>
                <div class="modal-body">


                    <form>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">OTP<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="registrationOTP"
                                    placeholder="Please enter OTP">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary float-right"
                            onclick="getRegister();">Submit</button>
                    </form>
                </div>

               
            </div>
        </div>
    </div> -->
    <script>

        function getRegister() {
            window.location.href = "studentDashboard.html";
        }
    </script>
    <script src="vendors/jquery/jquery.min.js"></script>
    <script src="vendors/popper.js/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>