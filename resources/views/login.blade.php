<!doctype html>
<html lang="en">

<head>
    <title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('login_page/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Form</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    @if (session('error'))

                        <div class="alert alert-warning" role="alert">
                         {{ session('error') }}
                        </div>
                    @endif
                    <div class="wrap">
                        <div class="img" style="background-image: url({{ asset('login_page/images/bg-1.jpg') }});">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <p class="text-muted">Silahkan Masukkan Username dan Password</p>
                            <form action="/login" class="signin-form" method="POST">
                                @csrf

                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="username" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" name="password" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('login_page/js/jquery.min.js') }}"></script>
    <script src="{{ asset('login_page/js/popper.js') }}"></script>
    <script src="{{ asset('login_page/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_page/js/main.js') }}"></script>

</body>

</html>
