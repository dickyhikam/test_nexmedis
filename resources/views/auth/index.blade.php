<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Nexmedis - {{ $title }}</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            <center>
                                <a class="logo" href="{{ url('/') }}" style="width: 200px; height: auto;">
                                    <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo1.png') }}" alt="looginpage">
                                    <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo-dark.png') }}" alt="logo">
                                </a>
                            </center>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" action="{{ url('/action_login') }}" method="POST">
                                {{ csrf_field() }}
                                <h2 class="text-center">Sign in to account</h2>
                                <p class="text-center">Enter your email &amp; password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address<c style="color: red;">*</c></label>
                                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Test@gmail.com" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password<c style="color: red;">*</c></label>
                                    <div class="form-input position-relative">
                                        <input class="form-control @error('login.password') is-invalid @enderror" type="password" name="login[password]" id="password" placeholder="*********" value="{{ old('login.password') }}">
                                        <div class="show-hide"><span class="show"> </span></div>

                                        @error('login.password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="form-group mb-0 checkbox-checked">
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in </button>
                                    </div>
                                </div>
                                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ url('/register') }}">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jquery-->
        <script src="{{ asset('assets/js/vendors/jquery/jquery.min.js') }}">
        </script>
        <!-- bootstrap js-->
        <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
        <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
        <!--fontawesome-->
        <script src="{{ asset('assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
        <!-- password_show-->
        <script src="{{ asset('assets/js/password.js') }}"></script>
        <!-- custom script -->
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#email').keyup(function() {
                    var txt = $(this).val();
                    if (txt !== '') {
                        $('#email').removeClass('is-invalid'); //remove the written class name
                    }
                });
                $('#password').keyup(function() {
                    var txt = $(this).val();
                    if (txt !== '') {
                        $('#password').removeClass('is-invalid'); //remove the written class name
                    }
                });

                @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch (type) {
                    case 'info':
                        toastr["info"]("{{ Session::get('message') }}", "Information");
                        break;

                    case 'warning':
                        toastr["warning"]("{{ Session::get('message') }}", "Warning!");
                        break;

                    case 'success':
                        toastr["success"]("{{ Session::get('message') }}", "Success");
                        break;

                    case 'error':
                        toastr["error"]("{{ Session::get('message') }}", "Error");
                        break;
                }
                @endif
            });

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        </script>
    </div>
</body>

</html>