<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/now-ui-kit.css_v=1.1.0.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-left">
                    <a href="index.html" class="logo-dark">
                        <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                    </a>
                    <a href="index.html" class="logo-light">
                        <span><img src="assets/images/logo.png" alt="" height="18"></span>
                    </a>
                </div>

                <!-- title-->
                <h4 class="mt-0">Free Sign Up</h4>
                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>

                <!-- form -->
                @if (count($errors) >0)
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger"> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{route('register.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input class="form-control" type="text" name="full_name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" name="phone" placeholder="Enter your phone" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">School Name</label>
                        <input class="form-control" type="text" name="school_name" placeholder="Enter your school name" required>
                    </div>
                    <div class="form-group">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control" type="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Enter your password">
                    </div>

                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i> Sign Up </button>
                    </div>
                    <!-- social-->

                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Already have account? <a href="{{route('login.index')}}" class="text-muted ml-1"><b>Log In</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">I love the color!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
            </p>
            <p>
                - Hyper Admin User
            </p>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- bundle -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

</body>

</html>
